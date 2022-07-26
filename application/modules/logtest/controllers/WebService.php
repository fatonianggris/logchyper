<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WebService extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library("NuSoap_libs");
        $this->server = new soap_server();
        $this->server->configureWSDL('WebService Realtime Graph', 'wsdl', 'http://localhost/log/logtest/webservice');

        //Declaration service name =========================================================
        $this->server->register('activity_A', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_A", 'document', 'literal', '');
        $this->server->register('activity_B', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_B", 'document', 'literal', '');
        $this->server->register('activity_C', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_C", 'document', 'literal', '');
        $this->server->register('activity_D', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_D", 'document', 'literal', '');
        $this->server->register('activity_E', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_E", 'document', 'literal', '');
        $this->server->register('activity_F', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_F", 'document', 'literal', '');
        $this->server->register('activity_G', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_G", 'document', 'literal', '');
        $this->server->register('activity_H', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_H", 'document', 'literal', '');
        $this->server->register('activity_I', array('pid' => 'xsd:string'), array('Data' => 'tns:ArrayCreateStatus'), '', $this->server->wsdl->endpoint . "#activity_I", 'document', 'literal', '');

        $this->server->wsdl->addComplexType(
                'ArrayCreateStatus', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
            'Response' => array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:Response[]')
                ), 'tns:Response'
        );
        $this->server->wsdl->addComplexType(
                'Response', 'element', 'struct', 'all', '', array(
            'timestamp' => array('name' => 'timestamp', 'type' => 'xsd:string'),
            'status' => array('name' => 'status', 'type' => 'xsd:string'),
            'messages' => array('name' => 'messages', 'type' => 'xsd:string')
                )
        );

        function activity_A($pid) {
            $data = modules::run("logtest/cypherexecution/activity_A", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_B($pid) {
            $data = modules::run("logtest/cypherexecution/activity_B", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_C($pid) {
            $data = modules::run("logtest/cypherexecution/activity_C", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_D($pid) {
            $data = modules::run("logtest/cypherexecution/activity_D", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_E($pid) {
            $data = modules::run("logtest/cypherexecution/activity_E", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_F($pid) {
            $data = modules::run("logtest/cypherexecution/activity_F", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_G($pid) {
            $data = modules::run("logtest/cypherexecution/activity_G", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_H($pid) {
            $data = modules::run("logtest/cypherexecution/activity_H", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

        function activity_I($pid) {
            $data = modules::run("logtest/cypherexecution/activity_I", $pid);
            if ($data) {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "success", "messages" => "Create Log Success"));
            } else {
                $data = array("response" => array("timestamp" => date('Y-m-d H:i:s A'), "status" => "error", "messages" => "Create Log Error."));
            }
            return new soapval('return', 'tns:ArrayCreateStatus', $data);
        }

    }

    function index() {
        $this->server->service(file_get_contents("php://input"));
    }

}
