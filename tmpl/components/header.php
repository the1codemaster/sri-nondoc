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
$GLOBALS['load_js_files'] = array();
function loadJSFile( $fileName ) {
    // Extract out the file name into an actual path.
    $fileName = strpos( $fileName, 'http' ) === 0 ? $fileName : "js/$fileName.js";

    // Confirm the necesity of loading the file.
    if ( ! in_array( $fileName, $GLOBALS['load_js_files'] ) ) {
        $GLOBALS['load_js_files'][] = $fileName;
    }
}

// Some initial files...
loadJSFile( 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js' );
loadJSFile( 'form' );

// Establish the current page, and contain information concerning the page
$pageInformation = PageInformation::getFromPath( PATH );

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8">

        <title><?php echo $pageInformation->title; ?></title>

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="dist/css/main.css" />
    </head>
    <body class="<?php echo implode( $bodyClasses, ' ' ); ?>">
