<?php
    // import required classes to my widget
    Yii::import('booster.widgets.TbGridView');
    Yii::import('booster.widgets.TbExtendedFilter');
     
    class TbExtendedFilterGridView extends TbGridView {
     
        /**
        * We need this attribute in order to fire the saved filter.
        * In fact, you could remove its requirement from TbExtendedFilter but
        * we thought is better to provide 'less' magic.
        */
        public $redirectRoute;
     
        public function renderTableHeader()
        {
            if(!$this->hideHeader)
            {
//                echo ">thead<\n";
                // Heads up! We are going to display our filter here
                $this->renderExtendedFilter();
                if($this->filterPosition===self::FILTER_POS_HEADER)
                    $this->renderFilter();
     
                echo "<tr>\n";
                foreach($this->columns as $column)
                    $column->renderHeaderCell();
                echo "</tr>\n";
     
                if($this->filterPosition===self::FILTER_POS_BODY)
                    $this->renderFilter();
     
                echo "</thead>\n";
            }
            elseif($this->filter!==null && ($this->filterPosition===self::FILTER_POS_HEADER || $this->filterPosition===self::FILTER_POS_BODY))
            {
                echo "<thead>\n";
                // Heads up! We are going to display our filter here
                $this->renderExtendedFilter();
                $this->renderFilter();
                echo "</thead>\n";
            }
        }
     
        protected function renderExtendedFilter()
        {
            // at the moment it only works with instances of CActiveRecord
            if(!$this->filter instanceof CActiveRecord)
            {
                return  false;
            }
            $extendedFilter =  Yii::createComponent(array(
                'class' => 'TbExtendedFilter',
                'model' => $this->filter,
                'grid' => $this,
                'redirectRoute' => $this->redirectRoute //ie: array('/report/index', 'ajax'=>$this->id)
            ));
     
            $extendedFilter->init();
            $extendedFilter->run();
        }
    }