<?php
/**
 * Implements the ContentType abstract class and is used to store navigation
 * links in the database using the navigation_links table.
 *
 * @see init/mysql/NavigationLink.mysql
 */
class ProductGroup extends ContentType {
    /// The table name specified for this content type
    const TableName = 'product_group';

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
                    'title'       => 'Product Group',
                    'description' => 'The name of the product group that the
                                      element will describe',
                ),
            ) ),
            new TextField( array(
                'name'   => 'blurb',
                'public' => array(
                    'title' => 'Small Blurb of Group',
                    'description' => 'Short blurb that can be displayed about
                                      the product group',
                ),
            ) ),
            new TextField( array(
                'name'   => 'icon',
                'public' => array(
                    'title' => 'Product Group Icon',
                    'description' => 'The name of the icon, as follows fa- at
                                       fontawesome icons.',
                ),
            ) ),
            new TextAreaField( array(
                'name'   => 'description',
                'public' => array(
                    'title' => 'Description',
                    'description' => 'General description of the product group
                                      and other details',
                ),
            ) ),
            new TextField( array(
                'name'     => 'doc-link',
                'public'   => array(
                    'title'       => 'Documentation Link',
                    'description' => 'The link to the documentation for this
                                      product, if there is no link, simply
                                      leave this field empty.',
                ),
                'required' => false,
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
            'name'        => 'title',
            'blurb'       => 'blurb',
            'description' => 'description',
            'icon'        => 'icon',
            'doc-link'    => 'doclink',
        );
    }

    /**
     * Returns a description of the given form.
     *
     * @return string
     */
    public static function getDescription() {
        return 'The product group will be displayed as a component of the
                splash page and gives a small description of one of the
                equipment sections that is distributed in ARSLS.';
    }

    /**
     * Retrurns a human readable name for the form.
     *
     * @return string
     */
    public static function getName() {
        return 'Product Group';
    }

    /// Variables in a coordance to the database values.
    public $id;
    public $title;
    public $blurb;
    public $description;
    public $icon;
    public $doclink;

    /**
     * The name of an instance of the NavigationLink class.
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Print a navigation link in a cohesive fashion.
     *
     * @return string
     */
    public function __toString() {
        // Transform the title to be html outputable.
        $title = htmlentities($this->title );

        return "<div class=\"location-site\"
            <a href=\"{$this->href}\">{$this->title}</a>
        </div>";
    }
}
