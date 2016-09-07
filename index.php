<!DOCTYPE html>
<?php include_once'test_webhook.php'; ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />

    </head>

    <body>
        <fieldset>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php //echo("<pre>");var_dump($projects_Items); die();?>
                <input type="hidden" value="item.create" name="type">
                <input type="submit" value="Create Item">
            </form>
        </fieldset>
        <fieldset>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php //echo(count($projects_Items)); die();?>
                <input type="hidden" value="item.update" name="type">
                <select name="item_id">
                    <?php foreach ($projects_Items as $item) { ?>
                        <option value="<?php echo($item->item_id); ?>"><?php echo($item->title); ?></option>
                    <?php } ?>    
                </select>
                <input type="submit" value="Update Item">
            </form>
        </fieldset>
        <fieldset>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php //echo(count($projects_Items)); die();?>
                <input type="hidden" value="item.delete" name="type">
                <select name="item_id">
                    <?php foreach ($projects_Items as $item) { ?>
                        <option value="<?php echo($item->item_id); ?>"><?php echo($item->title); ?></option>
                    <?php } ?>    
                </select>
                <input type="submit" value="Delete Item">
            </form>
        </fieldset>

    </body>
</html>
