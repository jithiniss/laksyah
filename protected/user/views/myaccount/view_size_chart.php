<div class="container">
        <div class="row">
                <div class="col-xs-12 col-sm-8">
                        <h5>Product Name: <?php echo $model->product_name; ?></h5>
                        <h5>Product Code: <?php echo $model->product_code; ?></h5>
                        <h5>Measurement Type: <?= $model->type == 1 ? 'Standerd' : 'Custom'; ?></h5>
                        <?php if ($model->type == 1) { ?>
                                <h5>Unit: Cm</h5>
                                <h5>Standerd: <?php
                                        if ($model->standerd == 1) {
                                                echo 'Small';
                                        } else if ($model->standerd == 2) {
                                                echo 'Medium';
                                        } else if ($model->standerd == 3) {
                                                echo 'Large';
                                        }
                                        ?></h5>
                        <?php } else if ($model->type == 2) { ?>
                                <h5>Unit: <?= $model->unit == 1 ? 'In' : 'Cm'; ?></h5>
                        <?php } ?>

                        <table width="100%">
                                <tr>
                                        <th colspan="5" class="text-center" style="font-size: 18px; text-decoration: underline;">Measurements</th>

                                </tr>
                                <?php if ($model->type == 1) { ?>



                                        <?php if ($model->standerd == 1) { ?>
                                                <tbody>
                                                        <tr>
                                                                <th>Chest </th>
                                                                <th>34</th>

                                                        </tr>
                                                        <tr>
                                                                <th>Waist </th>
                                                                <th>28</th>

                                                        </tr>

                                                        <tr>
                                                                <th>Hip </th>
                                                                <th>38</th>

                                                        </tr>
                                                        <tr>
                                                                <th>Shoulder </th>
                                                                <th>15</th>

                                                        </tr>
                                                        <tr>
                                                                <th>Neck </th>
                                                                <th>7</th>

                                                        </tr>

                                                        <tr>
                                                                <th>Skirt Length</th>
                                                                <th>43</th>

                                                        </tr>


                                                </tbody>

                                        <?php } else if ($model->standerd == 2) { ?>
                                                <tbody>
                                                        <tr>
                                                                <th>Chest </th>

                                                                <th>36</th>

                                                        </tr>
                                                        <tr>
                                                                <th>Waist </th>

                                                                <th>30</th>

                                                        </tr>

                                                        <tr>
                                                                <th>Hip </th>

                                                                <th>40</th>

                                                        </tr>
                                                        <tr>
                                                                <th>Shoulder </th>

                                                                <th>15</th>

                                                        </tr>
                                                        <tr>
                                                                <th>Neck </th>

                                                                <th>7.5</th>

                                                        </tr>

                                                        <tr>
                                                                <th>Skirt Length</th>

                                                                <th>43</th>

                                                        </tr>


                                                </tbody>
                                        <?php } else if ($model->standerd == 2) { ?>
                                                <tbody>
                                                        <tr>
                                                                <th>Chest </th>

                                                                <th>38</th>
                                                        </tr>
                                                        <tr>
                                                                <th>Waist </th>

                                                                <th>34</th>
                                                        </tr>

                                                        <tr>
                                                                <th>Hip </th>

                                                                <th>42</th>
                                                        </tr>
                                                        <tr>
                                                                <th>Shoulder </th>

                                                                <th>15.5</th>
                                                        </tr>
                                                        <tr>
                                                                <th>Neck </th>

                                                                <th>8</th>
                                                        </tr>

                                                        <tr>
                                                                <th>Skirt Length</th>

                                                                <th>43</th>
                                                        </tr>


                                                </tbody>
                                        <?php } ?>

                                <?php } else if ($model->type == 2) { ?>


                                        <tbody>
                                                <tr>
                                                        <th>Around neck</th>

                                                        <th><?php echo $model->around_neck; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Neck depth</th>

                                                        <th><?php echo $model->neck_depth; ?></th>
                                                </tr>

                                                <tr>
                                                        <th>Around upper chest </th>

                                                        <th><?php echo $model->around_upper_chest; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around chest </th>

                                                        <th><?php echo $model->around_chest; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around lower chest </th>

                                                        <th><?php echo $model->around_lower_chest; ?></th>
                                                </tr>

                                                <tr>
                                                        <th>Shoulder to breastpoint</th>

                                                        <th><?php echo $model->shoulder_to_breastpoint; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around waist</th>

                                                        <th><?php echo $model->around_waist; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Shoulder to waist</th>

                                                        <th><?php echo $model->shoulder_to_waist; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around armhole</th>

                                                        <th><?php echo $model->around_armhole; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Sleeve length</th>

                                                        <th><?php echo $model->sleeve_length; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Arm length</th>

                                                        <th><?php echo $model->arm_length; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around upper arm</th>

                                                        <th><?php echo $model->around_upper_arm; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around elbow</th>

                                                        <th><?php echo $model->around_elbow; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around wrist</th>

                                                        <th><?php echo $model->around_wrist; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Length upper garment</th>

                                                        <th><?php echo $model->length_upper_garment; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Shoulder width</th>

                                                        <th><?php echo $model->shoulder_width; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around lower waist</th>

                                                        <th><?php echo $model->around_lower_waist; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Waist to ankle</th>

                                                        <th><?php echo $model->waist_to_ankle; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Inseam to ankle</th>

                                                        <th><?php echo $model->inseam_to_ankle; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around hip</th>

                                                        <th><?php echo $model->around_hip; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around tigh</th>

                                                        <th><?php echo $model->around_tigh; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around knee</th>

                                                        <th><?php echo $model->around_knee; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around calf</th>

                                                        <th><?php echo $model->around_calf; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Around ankle</th>

                                                        <th><?php echo $model->around_ankle; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Skirt length</th>

                                                        <th><?php echo $model->skirt_length; ?></th>
                                                </tr>
                                                <tr>
                                                        <th>Gown full length</th>

                                                        <th><?php echo $model->gown_full_length; ?></th>
                                                </tr>


                                        </tbody>
                                <?php } ?>

                        </table>
                        <br />
                        <br />
                        <br />
                        <br /> <br />
                        <br />
                        <br />
                        <br /> <br />
                        <br />
                        <br />
                        <br />
                </div>
                <div class="col-xs-12 col-sm-4">
                        <div class="view_chart">
                                <br />
                                <br />
                                <br />
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/SizeChartList" class="btn btn-danger">
                                        View Your Measurement List
                                </a>
                        </div>
                </div>

        </div>
</div>

<!--<script>
        function ConfirmDelete()
        {
                var x = confirm("Are you sure you want to delete?");
                if (x)
                        return true;
                else
                        return false;
        }
</script>-->