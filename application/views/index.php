<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <?php $this->load->view('css') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php $this->load->view('sidebar') ?>

        <div class="content-wrapper">
            <?php include $page_name . ".php"; ?>
        </div>
        <?php $this->load->view('footer') ?>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <?php $this->load->view('js') ?>
</body>

</html>