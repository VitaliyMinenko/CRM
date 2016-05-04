<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <title>CRM Win-Win</title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo">CRM</div>
            </div><!-- header -->

            <?php if (Yii::app()->user->checkAccess('2')) { ?>
                <div id="mainmenu">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => array(
                            array('label' => 'Home', 'url' => array('/site/index')),
                            array('label' => 'Планировщик', 'url' => array('/Planes/index', 'view' => 'about')),
                            array('label' => 'Сотрудники', 'url' => array('/User/admin', 'view' => 'about')),
                            array('label' => 'Заказчики', 'url' => array('/Clients/admin', 'view' => 'about')),
                            array('label' => 'Отчет сотрудников', 'url' => array('/userReports/index', 'view' => 'about')),
                            array('label' => 'Перевозчики', 'url' => array('/Carrier/admin', 'view' => 'about')),
                          //  array('label' => 'Выборка из базы в Exel', 'url' => array('/CustomQuery/index', 'view' => 'about')),
                            array('label' => 'Маршруты', 'url' => array('/Shipping/admin', 'view' => 'about')),
                            array('label' => 'Перевозки', 'url' => array('/Direction/MyDirection', 'view' => 'about')),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                    ?>
                </div><!-- mainmenu -->
                <?php } ?>
                <?php if (Yii::app()->user->checkAccess('1')) { ?>
                <div id="mainmenu">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => array(
                            array('label' => 'Home', 'url' => array('/site/index')),
                            //   array('label'=>'Users Admin', 'url'=>array('/User/admin', 'view'=>'about')),
                            array('label' => 'Заказчики', 'url' => array('/Clients/admin', 'view' => 'about')),
                            array('label' => 'Планировщик', 'url' => array('/Planes/index', 'view' => 'about')),
                            array('label' => 'Особые поручения', 'url' => array('/SpecialOrders/index', 'view' => 'about')),
                            // array('label'=>'User Reports', 'url'=>array('/userReports/index', 'view'=>'about')),
                            //array('label'=>'Carrier Admin', 'url'=>array('/Carrier/admin', 'view'=>'about')),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                    ?>
                </div><!-- mainmenu -->
                <?php } ?>
                <?php if (Yii::app()->user->checkAccess('3')) { ?>
                <div id="mainmenu">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => array(
                            array('label' => 'Home', 'url' => array('/site/index')),
                            array('label' => 'Планировщик', 'url' => array('/Planes/index', 'view' => 'about')),
                            array('label' => 'Особые поручения', 'url' => array('/SpecialOrders/index', 'view' => 'about')),
                            array('label' => 'Перевозчики', 'url' => array('/Carrier/admin', 'view' => 'about')),
                            array('label' => 'Заказчики', 'url' => array('/Clients/admin', 'view' => 'about')),
                            array('label' => 'Маршруты', 'url' => array('/Shipping/admin', 'view' => 'about')),
                            array('label' => 'Добавить в отчет', 'url' => array('/LogReport/index', 'view' => 'about')),
                            array('label' => 'Мои перевозки', 'url' => array('/Direction/MyDirection', 'view' => 'about')),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                    ?>
                </div><!-- mainmenu -->
            <?php } ?>



            <?php if (isset($this->breadcrumbs)): ?>
    <?php
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    ));
    ?><!-- breadcrumbs -->
                <?php endif ?>

<?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; 2015  by Vitlii Minenko.<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
