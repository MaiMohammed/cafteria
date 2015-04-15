<?php

class Application_Form_Product extends Zend_Form {

    public function init() {

        $this->setAttrib('enctype', 'multipart/form-data');
        $proname = new Zend_Form_Element_Text("prod_name");
        $proname->setLabel("Product :");
        $proname->setRequired();
        $proname->addFilter(new Zend_Filter_StripTags());
        $proname->setAttrib("placeholder", "Enter Product Name");

        $image = new Zend_Form_Element_File('prod_image');
        //$image->setLabel('Upload Product image:')->setDestination('/var/www/html/cafteria/upload');
        // ensure only 1 file
        $image->addValidator('Count', false, 1);
        $image->setRequired(true);
        // limit to 2mb
        $image->addValidator('Size', false, 2097152);
        // only JPEG, PNG, and GIFs
        $image->addValidator('Extension', false, 'jpg,png,gif');

        $catName = new Zend_Form_Element_Select("cat_id");  //create obj
        $catName->setLabel('Category :');

        //var_dump($this->cats);
        //cats
        $catArray = array();
        for ($i = 0; $i < count($this->cats); $i++) {
            
                /* use value as the key,while form submited,key was added into response obj */
            $catArray[$this->cats[$i]['id']] = $this->cats[$i]['cat_name']; //create the $list
            
        }
        $catName->addMultiOptions($catArray);

        echo count($this->cats);


        $submit = new Zend_Form_Element_Submit("Add");
        $reset = new Zend_Form_Element_Reset("Reset");


        $this->addElements(array($proname, $image,$catName, $submit, $reset));
    }

}
