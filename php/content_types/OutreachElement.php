<?php
/**
 * Implements the ContentType abstract class and is used to store navigation
 * links in the database using the navigation_links table.
 *
 * @see init/mysql/NavigationLink.mysql
 */
class OutreachElement extends ContentType {
    /// The table name specified for this content type
    const TableName = 'outreach_element';

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
                    'title'       => 'Name of Element',
                    'description' => 'The name of the element that will
                                      be displayed on the outreach page',
                ),
            ) ),
            new TextField( array(
                'name'   => 'url',
                'public' => array(
                    'title'       => 'Link to outreach site',
                    'description' => 'The full link to a site that is described
                                      for outreach if available.',
                ),
            )),
            new TextAreaField( array(
                'name'   => 'description',
                'public' => array(
                    'title' => 'Description',
                    'description' => 'Description of the outreach site that
                                      will be described',
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
            'url'             => 'url',
            'name'            => 'title',
            'description'     => 'description',
        );
    }

    /**
     * Returns a description of the given form.
     *
     * @return string
     */
    public static function getDescription() {
        return 'The outreach element will be displayed as a component of the
                outreach section and provides information about projects that
                are associated with outside groups.';
    }

    /**
     * Retrurns a human readable name for the form.
     *
     * @return string
     */
    public static function getName() {
        return 'Outreach Element';
    }

    /// Variables in a coordance to the database values.
    public $id;
    public $title;
    public $description;

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

        return "<div class=\"navigation-link\"
            <a href=\"{$this->href}\">{$this->title}</a>
        </div>";
    }
}
