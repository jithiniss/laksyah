<?php

class UploadFile extends CApplicationComponent {

        public function folderName($min, $max, $id) {
                if ($id > $min && $id < $max) {
                        return $max;
                }
                else {
                        $xy = $this->folderName($min + 1000, $max + 1000, $id);
                        return $xy;
                }

        }

        public function fileExists($path, $name, $file, $sufix) {

                if (file_exists($path . $name)) {
                        $name = basename($path . $file->name, '.' . $file->extensionName) . '_' . $sufix . '.' . $file->extensionName;
                        return $this->fileExists($path, $name, $file, $sufix + 1);
                }
                else {
                        return $name;
                }

        }

        public function uploadImage($uploadfile, $id, $foldername = false) {
                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                }
                else {
                        $folder = "";
                }

                if (isset($uploadfile)) {
                        if (Yii::app()->basePath . '/../uploads/products') {
                                chmod(Yii::app()->basePath . '/../uploads/products', 0777);
                                if ($foldername) {
                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder);
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/', 0777);

                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id);
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/', 0777);
                                }
                                if ($uploadfile->saveAs(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName)) {
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/', 0777);
                                }
                        }
                }

        }

        public function uploadMultipleImage($uploadfile, $id, $foldername = false) {
                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                }
                else {
                        $folder = "";
                }
                foreach ($uploadfile as $upload) {
                        if (isset($upload)) {
                                if (Yii::app()->basePath . '/../uploads/products') {
                                        chmod(Yii::app()->basePath . '/../uploads/products', 0777);
                                        if ($foldername) {
                                                if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder))
                                                        mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder);
                                                chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/', 0777);

                                                if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id))
                                                        mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id);
                                                chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/', 0777);

                                                if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/'))
                                                        mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/');
                                                chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/', 0777);
                                        }
                                        $path = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . '/gallery/';

                                        $picname = $this->fileExists($path, $upload->name, $upload, 1);

                                        if ($upload->saveAs(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/' . $picname)) {
                                                //chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/gallery/' . '/', 0777);
                                        }
                                }
                        }
                }

        }

}

?>
