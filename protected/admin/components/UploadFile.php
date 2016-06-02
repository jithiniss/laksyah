<?php

class UploadFile extends CApplicationComponent {

        public function folderName($min, $max, $id) {
                if ($id > $min && $id < $max) {
                        return $max;
                } else {
                        $xy = $this->folderName($min + 1000, $max + 1000, $id);
                        return $xy;
                }
        }

        public function fileExists($path, $name, $file, $sufix) {

                if (file_exists($path . $name)) {
                        $name = basename($path . $file->name, '.' . $file->extensionName) . '_' . $sufix . '.' . $file->extensionName;
                        return $this->fileExists($path, $name, $file, $sufix + 1);
                } else {
                        return $name;
                }
        }

        public function uploadHoverImage($uploadfile, $id, $foldername = false, $dimensions = array()) {

                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                } else {
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

                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/hover'))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/hover');
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . 'hover/', 0777);
                                }
                                if ($uploadfile->saveAs(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/hover/hover.' . $uploadfile->extensionName)) {
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/hover/hover.' . $uploadfile->extensionName, 0777);
                                        // $this->WaterMark(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/hover/hover.' . $uploadfile->extensionName, '/../images/watermark.png');
                                        $file = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/hover/hover.' . $uploadfile->extensionName;
                                        $path = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/hover';
//                                        if (!empty($dimensions)) {
//
//                                                $this->Resize($file, $dimensions['width'], $dimensions['height'], 'hover', $path, $uploadfile->extensionName);
//                                        }
                                }
                        }
                }
        }

        public function uploadImage($uploadfile, $id, $foldername = false, $dimensions = array()) {

                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                } else {
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
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName, 0777);
                                        //$this->WaterMark(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName, '/../images/watermark.png');

                                        $file = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName;
                                        $path = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id;
                                        if (!empty($dimensions)) {
                                                foreach ($dimensions as $dimension) {
                                                        $this->Resize($file, $dimension['width'], $dimension['height'], $dimension['name'], $path, $uploadfile->extensionName);
                                                }
                                        }
                                }
                        }
                }
        }

        public function uploadMultipleImage($uploadfile, $id, $foldername = false, $dimensions = array()) {

                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                } else {
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
                                                chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . $id . '/gallery/' . $picname, 0777);
                                                // $this->WaterMark(Yii::app()->basePath . '/../uploads/products/' . $folder . $id . '/gallery/' . $picname, '/../images/watermark.png');
                                                $file = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/' . $picname;



                                                if (!empty($dimensions)) {



                                                        foreach ($dimensions as $dimension) {
                                                                if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . '/gallery/' . $dimension['name']))
                                                                        mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . '/gallery/' . $dimension['name']);

                                                                $path = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . '/gallery/' . $dimension['name'];

                                                                $this->ResizeMultiple($file, $dimension['width'], $dimension['height'], $path, $picname);
                                                        }
                                                }
                                        }
                                }
                        }
                }
        }

        public function WaterMark($orginal, $watermark) {

                $orginal1 = imagecreatefromjpeg($orginal);
                $watermarks = Yii::app()->basePath . $watermark;
                $watermark1 = imagecreatefrompng($watermarks);
                $resize = new EasyImage($orginal);

                // Get dimensions
                $orginalWidth = imagesx($orginal1);
                $orginalHeight = imagesy($orginal1);

                $watermarkWidth = imagesx($watermark1);
                $watermarkHeight = imagesy($watermark1);
                $offset_x = ($orginalWidth - $watermarkWidth) / 2;
                $offset_y = ($orginalHeight - $watermarkHeight) / 2;


                $resize->watermark(Yii::app()->baseUrl . $watermark, $offset_x, $offset_y, 25);

                $resize->save($orginal);
        }

        public function Resize($file, $width, $height, $name, $path, $extension) {
//                var_dump($file);
////                exit;
                $resize = new EasyImage($file);
                $resize->resize($width, $height);
                $resize->save($path . '/' . $name . '.' . $extension);
        }

        public function ResizeMultiple($file, $width, $height, $path, $name) {


                $resize = new EasyImage($file);
                $resize->resize($width, $height);
                $resize->save($path . '/' . $name);
        }

        public function uploadVideo($video, $id, $foldername = false, $dimensions = array()) {



                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                } else {
                        $folder = "";
                }


                if (isset($video)) {

                        if (Yii::app()->basePath . '/../uploads/products') {
                                chmod(Yii::app()->basePath . '/../uploads/products', 0777);
                                if ($foldername) {


                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder);
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/', 0777);

                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id);
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/', 0777);

                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/videos'))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/videos');
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . 'videos/', 0777);
                                }
                                if ($video->saveAs(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/videos/video.' . $video->extensionName)) {



                                        $a = chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/videos/video.' . $video->extensionName, 0777);


                                        $file = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/videos/video.' . $video->extensionName;

                                        $path = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/videos';
                                }
                        }
                }
        }

}

?>
