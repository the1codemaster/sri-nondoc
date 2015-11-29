<?php
/**
 * @package AtomicAppointment
 *
 * Is the header of the page, comes before the content and contains is as
 * a basic html structure.
 */
if ( ! isset( $bodyClasses ) ) {
    $bodyClasses = array();
}


/**
 * Establishes a method of including javascript files. This is implemented
 * by the footer and the files loaded before the closing body tag.
 */
$loadJSFiles = array( 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js' );
function loadJSFile( $fileName ) {
    global $loadJSFiles;

    // Extract out the file name into an actual path.
    $fileName = "js/$fileName.js";

    // Confirm the necesity of loading the file.
    if ( ! in_array( $fileName, $loadJSFiles ) ) {
        $loadJSFiles[] = $fileName;
    }
}

// Some initial files...
loadJSFile( 'form' );

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <?php if ( isset( $pageTitle ) ) : ?>
            <title><?php echo $pageTitle; ?></title>
        <?php endif; ?>

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="dist/css/main.css" />
    </head>
    <body class="<?php echo implode( $bodyClasses, ' ' ); ?>">