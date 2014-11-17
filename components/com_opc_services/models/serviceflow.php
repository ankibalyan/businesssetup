<?php

/**
 * @version     1.0.0
 * @package     com_llp_service
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ankit <ankit.kr.balyan@gmail.com> - http://igotstudy.com
 */
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');

/**
 * Llp_service model.
 */
class opc_servicesModelServiceflow extends JModelItem {

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                
            );
        }
        parent::__construct($config);
    }
      function getData($userId , $serviceId){
     
        $db = $this->getDbo();
        $strQry="SELECT a.register_id,b.recId as dirdetails,c.recId as companyInfo,country_state,no_of_directors,Registration_Pvt_Ltd_gov_fee,Registration_Pvt_Ltd_price,PAN_Application_gov_fee,PAN_Application_price, TAN_Application_gov_fee,
        TAN_Application_price,Business_Commencement_gov_fee,Business_Commencement_price,Service_Tax_Documents_gov_fee, Service_Tax_Documents_price,Shops_Establishments_gov_fee,
        Shops_Establishments_price,share_capital, total_gov_fee, total_price_fee ,
        director_name,director_address,director_mail_id,director_qualification,director_birthplace,director_din_file,director_pancard_file,dir_idproof,
        idproof_file,  dir_addressproof, addressproof_file ,director_share ,
 director_photograph_file, first_director,promo_check, promoters_name, promoters_mail, promoters_percentage_of_share , contact_country_state ,
 first_name, second_name, third_name, name_significance, company_main_object, registered_address, addressproof, police_station_Name_and_address ,
 contact_first_name, contact_last_name, contact_number, mail_id, city, address
        FROM awfrq_client_company_registration as a 
        left outer join awfrq_client_company_documents as b on a.register_id=b.register_id 
        left outer join awfrq_client_company_info as c on a.register_id=c.register_id 
        left outer join awfrq_client_contact_and_entity_info as d on a.register_id=d.register_id 
        WHERE userId= $userId and service_flag='$serviceId' and a.delFlag=0 ";

        $db->setQuery($strQry);
        $result = $db->loadObjectList();
        return $result;
     
     
     }
     
     
      function getDirno($recId,$register_id){
     
                                                $db   = $this->getDbo();
                                                $strqry_director1="select recId  from  awfrq_client_company_documents  where register_id=$register_id";

                                                $query1=$db->setQuery($strqry_director1);
                                                $result = $db->loadObjectList();
                                                $slno=0;
                                                foreach ($result as $list1) : 
                                                $slno++;
                                                if($list1->recId ==$recId)
                                                break;
                                                endforeach;
                                                
                                                return $slno;
                                    }
                        function getdirConut($register_id){
                        
                                                $db   = $this->getDbo();
                                                $app = JFactory::getApplication();
                                                $strqry_director1="select no_of_directors  from  awfrq_client_company_registration  where register_id=$register_id";
                                                 if($dirCount > $noOfDir) 
                                                $app->Redirect( 'index.php/component/fileupload/fileuploadss?edit=4' );

                                                $query1=$db->setQuery($strqry_director1);
                                                $result = $db->loadObject();
                                                $noOfDir=$result->no_of_directors;
                                                
                                                $strqry_director1="select count(*) as dirCount  from  awfrq_client_company_documents  where register_id=$register_id";

                                                $query1=$db->setQuery($strqry_director1);
                                                $result = $db->loadObject();
                                                $dirCount=$result->dirCount;
                                                if($dirCount==$noOfDir) 
                                                $app->Redirect( 'index.php/component/fileupload/fileuploadss?id=0&edit=3' );
                                                else if($dirCount  < $noOfDir)
                                                    $slno=$dirCount+1;
                                                    else  if($dirCount > $noOfDir) 
                                                $app->Redirect( 'index.php/component/fileupload/fileuploadss?edit=4' );
                                                return $slno;
                                        }
     
      function getDirData($register_id){
     
                                                $db   = $this->getDbo();
                                                $strqry_director1="select recId,director_name,director_address,director_mail_id,director_qualification,director_birthplace,director_din_file,director_pancard_file,dir_idproof,
                                                    idproof_file,  dir_addressproof, addressproof_file,director_share ,
 director_photograph_file, first_director, promoters_name, promoters_mail, promoters_percentage_of_share,promo_check  from  awfrq_client_company_documents  where register_id=$register_id";

                                                $query1=$db->setQuery($strqry_director1);
                                                $result = $db->loadObjectList();
                                                return $result;
                                    }
     
      function getDirDataRecId($register_id){
                                                $db   = $this->getDbo();
                                            //  if($RecId==0){
                                                $strqry_director1="select recId,director_name,director_address,director_mail_id,director_qualification,director_birthplace,director_din_file,director_pancard_file,dir_idproof,
                                                    idproof_file,  dir_addressproof, addressproof_file,director_share ,
                                                    director_photograph_file, first_director, promoters_name, promoters_mail, promoters_percentage_of_share,promo_check  from  awfrq_client_company_documents  where register_id=$register_id order by recId";
                                            /*  } else {
                                                $strqry_director1="select recId,director_name,director_address,director_mail_id,director_qualification,director_birthplace,director_din_file,director_pancard_file,director_passport_file,
director_adharcard_file, director_election_file, director_dl_file, director_mobilebill_file, director_electricitybill_file, director_telephonebill_file,director_bankstatement_file,
 director_photograph_file, first_director, promoters_name, promoters_mail, promoters_percentage_of_share ,promo_check  from  awfrq_client_company_documents  where register_id=$register_id and recId=$RecId";
                                                } */
                                                $query1=$db->setQuery($strqry_director1);
                                                $result = $db->loadObjectList();
                                                return $result;
                                    }
     
     
     
    protected function populateState($ordering = null, $direction = null) {

        // Initialise variables.
        $app = JFactory::getApplication();

        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);

        

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return  JDatabaseQuery
     * @since   1.6
     */
    protected function getListQuery() {
        $db     = $this->getDbo();
        $query  = $db->getQuery(true);
        return $query;
    }


    public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }

}
