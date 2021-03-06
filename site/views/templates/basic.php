<?php
    $this->load_lib("AuthenticationLib");
    $this->load_lib("MenuHelperLib");
    $this->load_lib("Config");

    $auth = $this->lib("AuthenticationLib");
    $helper = $this->lib("MenuHelperLib");
    $config =  $this->lib("Config");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Light Breaker</title>
    <link rel='shortcut icon' type='image/x-icon' href='img/favicon.ico' />
    <base href="<?php echo $config->get("app_folder") ?>/">
    <?php
    foreach($this->styles as $file){?>
        <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
    }
     ?>

    <?php
    foreach($this->scripts as $file){?>
        <script src="<?php echo $file; ?>"></script><?php
    }
     ?>

</head>

<body>
    <div id="main">
        <?php
            if($this->get_section("menu") != ""){
                $this->load_section("menu");
            }
        ?>
        <!--close menubar-->

        <div  id="site_content">


                <?php if($this->get_section("sidebar") != ""){ ?>
                    <div id="main_content" class="sidebar_on">
                <?php }else{ ?>
                    <div id="main_content">
                <?php } ?>


                <?php
                    if (isset($data['errors'])) {
                        ?>
                        <div class="errors">
                            <ul>
                                <?php
                                foreach ($data["errors"] as $error) {
                                    ?>
                                    <li><?= $error; ?></li>
                                    <?php
                                }
                                 ?>
                            </ul>
                        </div>

                        <?php
                    }
                 ?>

                 <?php
                     if (isset($data['infos'])) {
                         ?>
                         <div class="infos">
                             <ul>
                                 <?php
                                 foreach ($data["infos"] as $info) {
                                     ?>
                                     <li><?= $info; ?></li>
                                     <?php
                                 }
                                  ?>
                             </ul>
                         </div>

                         <?php
                     }
                  ?>

                <?php
                    $this->get_view($view);
                 ?>
            </div>


            <?php
                if($this->get_section("sidebar") != ""){
                    $this->load_section("sidebar");
                }
            ?>
            <!--close sidebar_container-->
            <!--close content-->
        </div>
        <!--close site_content-->

    </div>
    <!--close main-->

    <?php
        if($this->get_section("footer") != ""){
            $this->load_section("footer");
        }
     ?>
    <!--close footer-->

</body>

</html>
