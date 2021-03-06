<?php
/**
 * Implements the ContentType abstract class and is used to store navigation
 * links in the database using the navigation_links table.
 *
 * @see init/mysql/NavigationLink.mysql
 */
class AboutPerson extends ContentType {
    /// The table name specified for this content type
    const TableName = 'about_persons';

    /**
     * Return all the fields relevant to the form.
     *
     * @return [field]
     */
    public static function getFields() {
        return array(
            new TextField( array(
                'name'   => 'name',
                'public' => array(
                    'title'       => 'Name of Person',
                    'description' => 'The name of the person that the
                                      about person element wil be about',
                ),
            ) ),
            new TextField( array(
                'name'   => 'photo',
                'public' => array(
                    'title' => 'Image File Name',
                    'description' => 'File name of the image that will be
                                      referenced for the about person',
                ),
            ) ),
            new TextField( array(
                'name'   => 'description',
                'public' => array(
                    'title' => 'Description',
                    'description' => 'General description of the person and
                                      their job',
                ),
            ) ),
            new TextField( array(
                'name'     => 'link',
                'required' => false,
                'public'   => array(
                    'title' => 'Link',
                    'description' => 'A link to more information concerning this
                                      person.'
                ),
            ) ),
        );
    }

    /**
     * Returns a default map of the fields for the accessal of ajax data.
     * This allowes the form to be populated with data from this instance.
     *
     * @return array.
     */
    public static function getFormFieldMap() {
        return array(
            'name'        => 'name',
            'photo'       => 'imagePath',
            'description' => 'description',
            'link'        => 'link'
        );
    }

    /**
     * Returns a description of the given form.
     *
     * @return string
     */
    public static function getDescription() {
        return 'The about person element will be displayed as a component of the
                about page and provides the name, image and description of a person.';
    }

    /**
     * Retrurns a human readable name for the form.
     *
     * @return string
     */
    public static function getName() {
        return 'About Person';
    }

    /// Variables in a coordance to the database values.
    public $id;
    public $name;
    public $imagePath;
    public $description;
    public $link;

    /**
     * The name of an instance of the NavigationLink class.
     *
     * @return string
     */
    public function getTitle() {
        return $this->name;
    }
}
