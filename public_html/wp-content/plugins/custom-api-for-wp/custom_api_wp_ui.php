<?php

require('custom-api-handler.php');
require('customer_register_ui.php');


function custom_api_wp_delete_api($api11)
{

    $GetApi = get_option('CUSTOM_API_WP_LIST');
    unset($GetApi[$api11]);
    update_option('CUSTOM_API_WP_LIST', $GetApi);
    echo '<div class = "update notice" style="margin-left:7px;"> <p>API Deleted Sucessfully</p> </div>';
    custom_api_wp_list_api();
    return;
}
function custom_api_wp_sanitise1($var)
{
    $var = trim($var);
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = htmlspecialchars($var);
    return $var;
}
function custom_api_wp_edit_api($api1)
{

    $GetApi = get_option('CUSTOM_API_WP_LIST');
    $GetForm = get_option('mo_custom_api_form');

    $Details = $GetApi[$api1];
    $MethodName = $Details['MethodName'];
    $TableName =  $Details['TableName'];
    $SelectedColumn = $Details['SelectedColumn'];
    $ConditionColumn = $Details['ConditionColumn'];
    $SelectedCondtion = $Details['SelectedCondtion'];
    $SelectedParameter = $Details['SelectedParameter'];

    if (isset($_POST['SendResult'])) {
        if ($GetForm['status'] == 'yes') {

            $query = $GetForm['query'];

            $api_name_edit = $GetForm['ApiName'];
            $method_name_edit = $GetForm['MethodName'];
            $selected_column_edit = $GetForm['SelectedColumn'];
            $condition_column_edit = $GetForm['ConditionColumn'];
            $selected_condition_edit = $GetForm['SelectedCondtion'];
            $selected_parameter_edit = $GetForm['SelectedParameter'];



            //print_r($SelectedCoulmn);
            $current = array(
                $api_name_edit => array(
                    "TableName" => $TableName,
                    "MethodName" => $MethodName,
                    "SelectedColumn" => $selected_column_edit,
                    "ConditionColumn" => $condition_column_edit,
                    "SelectedCondtion" => $selected_condition_edit,
                    "SelectedParameter" => $selected_parameter_edit,
                    "query" => $query
                )

            );


            $list = get_option('CUSTOM_API_WP_LIST');

            unset($list[$api_name_edit]);

            $list[$api_name_edit] = $current[$api_name_edit];


            $api = get_site_url();
            if ($selected_condition_edit == 'no condition')
                $ApiDisplay =  "{$api}/wp-json/mo/v1/{$api_name_edit}";
            else
                $ApiDisplay =  "{$api}/wp-json/mo/v1/{$api_name_edit}/{" . $condition_column_edit . "}";
            update_option('CUSTOM_API_WP_LIST', $list);
            unset($GetForm['status']);
            update_option('mo_custom_api_form', $GetForm);

            custom_api_wp_edit_notice($ApiDisplay, $api_name_edit, $method_name_edit, $condition_column_edit, $selected_condition_edit, $selected_parameter_edit);
            custom_api_wp_list_api();

            return;
        }
    }

?>



    <div style="margin-top:2px;margin-left:0px;margin-right:20px;margin-bottom:15px;background-color: white;border:.1rem solid #bfc4c8;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-style:solid;">
        <div style="margin-bottom: 10px; visibility: hidden;">
            <p>hi</p>
        </div>
        <form method="POST"><?php wp_nonce_field('CheckNonce', 'SubmitUser'); ?>
            
            <div class='row' style="margin-left: 10px;">
                <!-- <form method="POST" name="TableForm" id="TableForm"> -->
                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> API Name</label>
                </div>
                <div class='col-md-6'>
                    <input type="text" id="ApiName" name="ApiName" <?php echo "value = '{$api1}'"; ?> readonly>

                </div>
            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> Select Method</label>
                </div>
                <div class='col-md-6'>
                    <select class="mo_custom_api_SelectColumn" id="MethodName" name="MethodName" disabled>
                        <option value="GET" <?php if ($MethodName == "GET") echo " selected='selected'";  ?>>GET</option>
                        <option value="POST" <?php if ($MethodName == "POST") echo " selected='selected'";  ?>>POST</option>
                        <option value="PUT" <?php if ($MethodName == "PUT") echo " selected='selected'";  ?>>PUT</option>
                        <option value="Delete" <?php if ($MethodName == 'Delete') echo " selected='selected'";  ?>>DELETE</option>




                    </select>

                </div>
            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> Select Table</label>
                </div>
                <div class='col-md-6'>

                    <select class="mo_custom_api_SelectColumn" name="select-table" id="select-table" disabled>

                        <?php

                        global $wpdb;
                        $sql = "SHOW TABLES LIKE '%%'";
                        $results = $wpdb->get_results($sql);
                        $table_name = [];
                        foreach ($results as $index => $value) {
                            foreach ($value as $tableName) {

                                array_push($table_name, $tableName);
                            }
                        }
                        foreach ($table_name as $tb) {
                            echo "<option value='{$tb}'";
                            if ($TableName == $tb) echo " selected='selected'";
                            echo " > {$tb} </option>";
                        }
                        ?>
                    </select>


                </div>
            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> Select Columns</label>
                </div>
                <div class='col-md-6'>
                    <select class="mo_custom_api_SelectColumn" id="SelectedColumn" multiple="multiple" name="Selectedcolumn">


                        <?php
                        global $wpdb;

                        $column = [];
                        $existing_columns = $wpdb->get_col("DESC {$TableName}", 0);
                        foreach ($existing_columns as $col) {
                            array_push($column, $col);
                        }
                        foreach ($column as $colu) {

                            $split = explode(",", $SelectedColumn);

                            echo "<option value='{$colu}'";

                            foreach ($split as $s) {
                                if ($s == $colu)
                                    echo " selected='selected'";
                            }

                            echo ">{$colu}</option>";
                        }

                        ?>
                    </select>
                </div>

            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-4'>
                    <label>Choose Column to apply condition</label>
                    <br>
                    <select class="mo_custom_api_SelectColumn" id="OnColumn" name="OnColumn">
                        <option value="">none selected </option>
                        <?php
                        global $wpdb;

                        $column = [];
                        $existing_columns = $wpdb->get_col("DESC {$TableName}", 0);
                        foreach ($existing_columns as $col) {
                            array_push($column, $col);
                        }
                        foreach ($column as $colu) {

                            echo "<option value='{$colu}'";
                            if ($ConditionColumn == $colu) echo " selected='selected'";
                            echo " > {$colu} </option>";
                        }
                        ?>
                    </select>

                </div>
                <div class='col-md-4'>
                    <label>Choose Condition</label>
                    <br>
                    <select class="mo_custom_api_SelectColumn" id="ColumnCondition" name="ColumnCondition">
                        <option value="no condition" <?php if ($SelectedCondtion == "no condition") echo " selected='selected'";  ?>>no condition </option>
                        <option value="=" <?php if ($SelectedCondtion == "=") echo " selected='selected'";  ?>>Equal </option>
                        <option value="Like" <?php if ($SelectedCondtion == "Like") echo " selected='selected'";  ?>>Like</option>
                        <option value=">" <?php if ($SelectedCondtion == "&amp;gt;") echo " selected='selected'";  ?>>Greater Than</option>
                        <option value="less than" <?php if ($SelectedCondtion == "less than") echo " selected='selected'";  ?>>Less Than</option>
                        <option value="!=" <?php if ($SelectedCondtion == "!=") echo " selected='selected'";  ?>>Not Equal</option>
                    </select>



                </div>
                <div class='col-md-4'>
                    <label>URL Parameters<b>[Default: First Parameter]</b></label>
                    <br>
                    <select class="mo_custom_api_SelectColumn" id="ColumnParam" onchange="custom_api_wp_CustomText()" name="ColumnParam">
                        <option value="1" <?php if ($SelectedParameter == "1") echo " selected='selected'";  ?>>First Parameter </option>
                        <option value="2" disabled <?php if ($SelectedParameter == "2") echo " selected='selected'";  ?>>Second Parameter</option>
                        <option value="3" disabled <?php if ($SelectedParameter == "3") echo " selected='selected'";  ?>>Third Parameter</option>
                        <option value="4" disabled <?php if ($SelectedParameter == "4") echo " selected='selected'";  ?>>Fourth Parameter</option>
                        <option value="5" disabled <?php if ($SelectedParameter == "5") echo " selected='selected'";  ?>>Custom value</option>

                    </select>


                    <div id="Param" style="visibility: hidden;">
                        <input type="text" id="CustomParam">
                    </div>
                </div>

            </div>

            <br>
            <hr style="size: 20px;border-top: 2px solid #eee;">
            <input type="submit" class='btn btn-primary' style="margin-left: 15px; margin-bottom: 20px;" value="Generate Api" name="SendResult" id="SendResult" onclick="custom_api_wp_ShowData()">
            <input type="text" id="QueryVal" name="QueryVal" style="visibility: hidden;">
            <input type="text" id="Selectedcolumn11" name="Selectedcolumn11" style="visibility: hidden;">


        </form>



        <?php


        ?>

    </div>



<?php


}

function custom_api_wp_list_api()
{
?>


    <div class="wrap" style=" margin-top: -7px; " >

        <div class="box-body">

            <div class="form-horizontal">
                <div class="box-body" style="margin-top:10px;margin-right:0px">
                    <div class="row" style="padding: unset;margin-left: 5px;">
                        <div class="col-md-7" style="background-color: white; border:.1rem solid #bfc4c8;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-style:solid;">
                            <div class="box-body table-responsive no-padding" style="overflow-y: auto">
                                <table id="tbldata" class="table table-hover" style="width: 400px;margin: 5px;">
                                    <thead>
                                        <tr class="header">
                                            <th style="display:none">RowId</th>
                                            <th>API NAME</th>
                                            <th>ACTIONS</th>


                                        </tr>
                                    </thead>

                                    <tbody id="tbodyid">
                                        <?php
                                        if (get_option('CUSTOM_API_WP_LIST')) {
                                            $list = get_option('CUSTOM_API_WP_LIST');
                                            foreach ($list as $key => $value) {
                                                echo "<tr>";
                                                echo " <td>" . $key . "</td>";
                                                echo "<td> <button class='btn btn-primary' style='font-size: 12px;' onclick = 'custom_api_wp_edit(this)'>Edit<i class='fas fa-user-edit'></i></button>&nbsp
                        <button class='btn btn-primary' style='font-size: 12px;' onclick ='custom_api_wp_delete(this)'>Delete<i class='fas fa-user-edit'></i></button>
                        </td>";
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="mo_support_layout">
                                <div>
                                    <h3>Contact Us</h3>
                                    <p>Need any help? Couldn't find an answer in FAQ?<br>Just send us a query so we can help you.</p>
                                    <form method="post" action=""><?php wp_nonce_field('CheckNonce', 'submit_contact_us'); ?>
                                        <input type="hidden" name="option" value="custom_api_wp_contact_us_query_option" />
                                        <table class="mo_settings_table">
                                            <tr>
                                                <td><input type="email" class="mo_table_textbox" required name="custom_api_wp_contact_us_email" placeholder="Enter email here" value=""></td>
                                            </tr>
                                            <tr>
                                                <td><input type="tel" id="contact_us_phone" pattern="[\+]\d{11,14}|[\+]\d{1,4}[\s]\d{9,10}" placeholder="Enter phone here" class="mo_table_textbox" name="custom_api_wp_contact_us_phone" value=""></td>
                                            </tr>
                                            <tr>
                                                <td><textarea class="mo_table_textbox" onkeypress="custom_api_wp_valid_query(this)" placeholder="Enter your query here" onkeyup="custom_api_wp_valid_query(this)" onblur="custom_api_wp_valid_query(this)" required name="custom_api_wp_contact_us_query" rows="4" style="resize: vertical;"></textarea></td>
                                            </tr>
                                        </table>
                                        <div style="text-align:center;">
                                            <input type="submit" name="submit" style="margin:15px; width:100px;" class="button button-primary button-large" />
                                        </div>
                                        <p>If you want custom features in the plugin, just drop an email at <a href="mailto:info@xecurify.com">info@xecurify.com</a>.</p>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>




<?php
}
function custom_api_wp_create_notice($ApiDisplay, $ApiName, $MethodName, $ConditionColumn, $SelectedCondtion, $SelectedParameter)
{
?>
    <div class="updated notice" style="margin-left:7px;">
        <p>API created successfully .</p>
        <p style="font-size: 14px; "><b>Api Name - <?php echo $ApiName; ?></b> </p>
        <p><?php echo " <b> <span style='color:green'> {$MethodName}</span> </b>  {$ApiDisplay}"; ?></p>
        <?php
        if ($SelectedCondtion != 'no condition') {
        ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Column Name</th>
                        <th>Description</th>
                        <th>Condition Applied</th>
                        <th>Parameter place in API</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <?php echo $ConditionColumn ?> </td>
                        <td>Enter data of respective column in mentioned parameter</td>
                        <td><?php
                            if ("&amp;gt;" == $SelectedCondtion)
                                echo 'Greater Than';
                            else
                                echo $SelectedCondtion; ?>
                        </td>
                        <td> <?php echo $SelectedParameter ?> </td>
                    </tr>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
<?php
}

function custom_api_wp_edit_notice($ApiDisplay, $api_name_edit, $method_name_edit, $condition_column_edit, $selected_condition_edit, $selected_parameter_edit)
{
?>
    <div class="updated notice" style="margin-left:7px;">
        <p>API updated successfully .</p>
        <p style="font-size: 14px; "><b> Api Name - <?php echo $api_name_edit; ?></b> </p>
        <p><?php echo " <b> <span style='color:red'> {$method_name_edit}</span> </b>  {$ApiDisplay}"; ?></p>
        <?php
        if ($selected_condition_edit != 'no condition') {
        ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Column Name</th>
                        <th>Description</th>
                        <th>Condition Applied </th>
                        <th>Parameter place in API</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <?php echo $condition_column_edit ?> </td>
                        <td>Enter data of respective column in mentioned parameter</td>
                        <td><?php
                            if ("&amp;gt;" == $selected_condition_edit)
                                echo 'Greater Than';
                            else
                                echo $selected_condition_edit; ?> </td>
                        <td> <?php echo $selected_parameter_edit ?> </td>
                    </tr>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
<?php
}

function custom_api_wp_invalid_notice()
{
?>
    <div class="error notice" style="margin-left: -0px;">
        <p>Invalid API or API Name field is empty</p>

    </div>
<?php
}

function custom_wp_api_check_method($var)
{
    if (isset($_POST['SubmitForm1'])) {
        $data = get_option('mo_custom_api_form1');
        if (!empty($data['MethodName'])) {
            if ($data['MethodName'] == $var) {
                echo " selected='selected'";
                unset($data['MethodName']);
                update_option('mo_custom_api_form1', $data);
            }
        }
    }
    if (isset($_POST['SendResult'])) {
        $FormData = get_option('mo_custom_api_form');
        if ((!empty($FormData['MethodName'])) && ($FormData['status'] == 'yes')) {
            if ($FormData['MethodName'] == $var) {
                echo " selected='selected'";
            }
        }
    }
}

function custom_api_wp_condition($var1)
{
    if (isset($_POST["SendResult"])) {
        $FormData = get_option('mo_custom_api_form');

        if (!empty($FormData['SelectedCondtion']) && ($FormData['status'] == 'yes')) {

            if ($FormData['SelectedCondtion'] ==  $var1) {
                echo " selected= 'selected' ";
            }
        }
    }
}
function custom_api_wp_param($var)
{

    $FormData = get_option('mo_custom_api_form');
    if (isset($_POST["SendResult"])) {
        if (!empty($FormData['SelectedParameter']) &&  ($FormData['status'] == 'yes')) {

            if ($FormData['SelectedParameter'] == $var) {
                echo "selected='selected'";

                $FormData['status'] == 'no';
                update_option('mo_custom_api_form', $FormData);
            }
        }
    }
}

function custom_api_wp_add_api()
{

    $check = true;
    $GetForm = get_option('mo_custom_api_form');

    if (isset($_POST['SendResult'])) {
        if ($GetForm['status'] == 'yes') {


            $ApiName = $GetForm['ApiName'];
            if (empty($ApiName)) {
                custom_api_wp_invalid_notice();
                $check = false;
            }
            $query = $GetForm["query"];
            $MethodName = $GetForm["MethodName"];
            $SelectedTable = $GetForm["TableName"];
            $SelectedColumn = $GetForm["SelectedColumn"];
            $ConditionColumn = $GetForm["ConditionColumn"];
            $SelectedCondtion = $GetForm["SelectedCondtion"];
            $SelectedParameter = $GetForm["SelectedParameter"];



            $current = array(
                $ApiName => array(
                    "TableName" => $SelectedTable,
                    "MethodName" => $MethodName,
                    "SelectedColumn" => $SelectedColumn,
                    "ConditionColumn" => $ConditionColumn,
                    "SelectedCondtion" => $SelectedCondtion,
                    "SelectedParameter" => $SelectedParameter,
                    "query" => $query
                )

            );

            if (get_option('CUSTOM_API_WP_LIST')) {
                $list = get_option('CUSTOM_API_WP_LIST');

                foreach ($list as $key => $value) {
                    if ($ApiName == $key) {



                        echo '
                   <div class="error notice" style="margin-left:0px">
        <p>API name already exist !!</p>
        </div>';

                        $check = false;
                        break;
                    }
                }
            }
            if ($check == true) {
                if (get_option('CUSTOM_API_WP_LIST')) {
                    $list[$ApiName] = $current[$ApiName];


                    $api = get_site_url();
                    if ($SelectedCondtion == 'no condition')
                        $ApiDisplay =  "{$api}/wp-json/mo/v1/{$ApiName}";
                    else
                        $ApiDisplay =  "{$api}/wp-json/mo/v1/{$ApiName}/{" . $ConditionColumn . "}";
                    update_option('CUSTOM_API_WP_LIST', $list);
                    unset($GetForm['status']);
                    update_option('mo_custom_api_form', $GetForm);
                    custom_api_wp_create_notice($ApiDisplay, $ApiName, $MethodName, $ConditionColumn, $SelectedCondtion, $SelectedParameter);
                    custom_api_wp_list_api();


                    return;
                } else {
                    $api = get_site_url();
                    if ($SelectedCondtion == 'no condition')
                        $ApiDisplay =  "{$api}/wp-json/mo/v1/{$ApiName}";
                    else
                        $ApiDisplay =  "{$api}/wp-json/mo/v1/{$ApiName}/{" . $ConditionColumn . "}";
                    update_option('CUSTOM_API_WP_LIST', $current);
                    unset($GetForm['status']);
                    update_option('mo_custom_api_form', $GetForm);
                    custom_api_wp_create_notice($ApiDisplay, $ApiName, $MethodName, $ConditionColumn, $SelectedCondtion, $SelectedParameter);
                    custom_api_wp_list_api();
                    return;
                }
            }
        }
    }


?>

    <div style="margin-top:3px;margin-left:0px;margin-right:15px;margin-bottom:15px;background-color: white; border:.1rem solid #bfc4c8;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-style:solid;">

        <form method="POST" style="visibility: hidden;"><?php wp_nonce_field('CheckNonce1', 'SubmitUser1'); ?>
            <input type="text" id="api_name_initial" name="api_name_initial" style="visibility: hidden;">
            <input type="text" id="method_name_initial" name="method_name_initial" style="visibility: hidden;">
            <input type="text" id="table_name_initial" name="table_name_initial" style="visibility: hidden;">
            <input type="submit" id="SubmitForm1" name="SubmitForm1" style="visibility: hidden;">
        </form>
        <form method="POST"><?php wp_nonce_field('CheckNonce', 'SubmitUser'); ?>
           
            <div class='row' style="margin-left: 10px;">

                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> API Name</label>
                </div>
                <div class='col-md-6'>
                    <input type="text" id="ApiName" <?php $data = get_option('mo_custom_api_form1');
                                                    if (isset($_POST['SubmitForm1'])) {
                                                        if (empty($data['ApiName'])) {
                                                            //empty
                                                        } else {
                                                            echo 'value ="' . $data['ApiName'] . '" ';
                                                            unset($data['ApiName']);
                                                            update_option('mo_custom_api_form1', $data);
                                                        }
                                                    }
                                                    $FormData = get_option('mo_custom_api_form');
                                                    if (isset($_POST['SendResult'])) {
                                                        if (($FormData['status'] == 'yes') && !empty($FormData['ApiName'])) {
                                                            echo 'value ="' . $FormData['ApiName'] . '" ';
                                                        }
                                                    }
                                                    ?> name="ApiName">
                </div>
            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> Select Method</label>
                </div>

                <div class='col-md-6'>
                    <select class="mo_custom_api_SelectColumn" id="MethodName" name="MethodName">
                        <option value="GET" <?php custom_wp_api_check_method("GET"); ?>>GET</option>
                        <option value="POST" disabled <?php custom_wp_api_check_method("POST"); ?>>POST<sub>[PREMIUM]</sub></option>
                        <option value="PUT" disabled <?php custom_wp_api_check_method("PUT"); ?>>PUT<span style="color: blue;" >[PREMIUM]</span></option>
                        <option value="Delete" disabled <?php custom_wp_api_check_method("Delete"); ?>>DELETE<span style="color: blue;" ><sub>[PREMIUM]</sub></span></option>
                    </select>
                </div>
            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> Select Table</label>
                </div>
                <div class='col-md-6'>

                    <select class="mo_custom_api_SelectColumn" name="select-table" onchange="custom_api_wp_GetTbColumn()" id="select-table">

                        <?php

                        global $wpdb;
                        $sql = "SHOW TABLES LIKE '%%'";
                        $results = $wpdb->get_results($sql);
                        $table_name = [];
                        foreach ($results as $index => $value) {
                            foreach ($value as $tableName) {

                                array_push($table_name, $tableName);
                            }
                        }
                        $data = get_option('mo_custom_api_form1');
                        $FormData = get_option('mo_custom_api_form');
                        foreach ($table_name as $tb) {
                            echo "<option value={$tb}";
                            if (isset($_POST["SubmitForm1"])) {
                                if (!empty($data['TableName'])) {
                                    if ($data['TableName'] == $tb) echo " selected='selected'";
                                }
                            }
                            if (isset($_POST["SendResult"])) {
                                if (($FormData['status'] == 'yes') && !empty($FormData['TableName'])) {
                                    if ($FormData['TableName'] == $tb) echo " selected='selected'";
                                }
                            }




                            echo ">{$tb}</option>";
                        }
                        ?>
                    </select>


                </div>
            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-6'>
                    <label class="mo_custom_api_labels"> Select Columns</label>
                </div>
                <div class='col-md-6'>
                    <select class="mo_custom_api_SelectColumn" id="SelectedColumn" multiple="multiple" name="Selectedcolumn">


                        <?php
                        global $wpdb;
                        $data = get_option('mo_custom_api_form1');
                        if (!empty($data['TableName'])) {
                            $table1 = $data['TableName'];

                            $column = [];
                            $existing_columns = $wpdb->get_col("DESC {$table1}", 0);
                            foreach ($existing_columns as $col) {
                                array_push($column, $col);
                            }
                            foreach ($column as $colu) {

                                echo "<option value={$colu}";

                                echo ">{$colu}</option>";
                            }
                        }

                        ?>
                        <?php
                        global $wpdb;
                        $data = get_option('mo_custom_api_form1');
                        $FormData = get_option('mo_custom_api_form');
                        if (empty($data['TableName'])) {
                            if (($FormData['status'] == 'yes') && !empty($FormData['TableName'])) {


                                // echo 'true';
                                $table1 = $FormData['TableName'];

                                $column11 =  $FormData['SelectedColumn'];


                                $column = [];
                                $existing_columns = $wpdb->get_col("DESC {$table1}", 0);
                                foreach ($existing_columns as $col) {
                                    array_push($column, $col);
                                }
                                // print_r($column);
                                foreach ($column as $colu) {
                                    $split = explode(",", $column11);

                                    echo "<option value={$colu}";

                                    foreach ($split as $s) {
                                        if ($s == $colu)
                                            echo " selected='selected'";
                                    }

                                    echo ">{$colu}</option>";
                                }
                            }
                        }

                        ?>

                    </select>

                </div>

            </div>
            <br>

            <div class='row' style="margin-left: 10px;">
                <div class='col-md-4'>
                    <label>Choose Column to apply condition</label>
                    <br>
                    <select class="mo_custom_api_SelectColumn" id="OnColumn" name="OnColumn">
                        <option value="">none selected </option>
                        <?php
                        global $wpdb;
                        $data = get_option('mo_custom_api_form1');
                        if (!empty($data['TableName'])) {
                            $table1 = $data['TableName'];

                            $column = [];
                            $existing_columns = $wpdb->get_col("DESC {$table1}", 0);
                            foreach ($existing_columns as $col) {
                                array_push($column, $col);
                            }
                            // print_r($column);
                            foreach ($column as $colu) {
                                echo "<option value={$colu}";
                                echo ">{$colu}</option>";
                            }

                            unset($data['TableName']);
                            update_option('mo_custom_api_form1', $data);
                        }


                        ?>
                        <?php
                        global $wpdb;
                        $FormData = get_option('mo_custom_api_form');
                        if (($FormData['status'] == 'yes') && !empty($FormData['TableName'])) {
                            // echo 'true';
                            $table1 = $FormData['TableName'];

                            $column = [];
                            $existing_columns = $wpdb->get_col("DESC {$table1}", 0);
                            foreach ($existing_columns as $col) {
                                array_push($column, $col);
                            }
                            foreach ($column as $colu) {
                                echo "<option value= '{$colu}' ";

                                if ($FormData['ConditionColumn'] == $colu) echo " selected = 'selected' ";

                                echo ">{$colu}</option>";
                            }
                        }


                        ?>

                    </select>

                    <?php
                    ?>
                </div>



                <div class='col-md-4'>
                    <label>Choose Condition</label>
                    <br>
                    <select class="mo_custom_api_SelectColumn" id="ColumnCondition" name="ColumnCondition">
                        no condition
                        <option value="no condition" <?php custom_api_wp_condition("no condition"); ?>>No Condition </option>
                        <option value="=" <?php custom_api_wp_condition("="); ?>>Equal </option>
                        <option value="Like" <?php custom_api_wp_condition("Like"); ?>>Like</option>
                        <option value=">" <?php custom_api_wp_condition("&amp;gt;"); ?>>Greater Than</option>
                        <option value="less than" <?php custom_api_wp_condition("less than"); ?>>Less Than</option>
                        <option value="!=" <?php custom_api_wp_condition("!="); ?>>Not Equal</option>
                    </select>

                </div>


                <div class='col-md-4'>
                    <label>URL Parameters  <b>[Default: First Parameter]</b></label>
                    <br>
                    <select class="mo_custom_api_SelectColumn" id="ColumnParam" onchange="custom_api_wp_CustomText()" name="ColumnParam">
                        <option value="1" >First Parameter </option>
                        <option value="2" disabled>Second Parameter</option>
                        <option value="3" disabled>Third Parameter</option>
                        <option value="4" disabled>Fourth Parameter</option>
                        <option value="5" disabled>Custom value</option>

                    </select>

                    <div id="Param" style="visibility: hidden;">
                        <input type="text" id="CustomParam">
                    </div>

                </div>

            </div>
            <br>

            <hr style="size: 20px;border-top: 2px solid #eee;">
            <input class='btn btn-primary' style="margin-bottom: 20px; margin-left: 15px;" type="submit" value="Generate Api" name="SendResult" id="SendResult" onclick="custom_api_wp_ShowData()">
            <input type="text" id="QueryVal" name="QueryVal" style="visibility:hidden;">
            <input type="text" id="Selectedcolumn11" name="Selectedcolumn11" style="visibility: hidden;">


        </form>



    </div>

<?php
}

function custom_api_wp_authentication()
{

?>
    <div class="wrap" style="margin-top: -7px;">


        <div class="box-body" style="margin-top:10px; margin-left: 10px;width:103%">
            <div class="row" style="padding: unset;">
                <div class="col-md-7" style="background-color: white;border:.1rem solid #bfc4c8;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-style:solid; padding: 25px; ">
                    <!-- <div id="mo_api_authentication_support_layout" class="mo_api_authentication_support_layout"> -->
                    <!-- <div id="mo_api_authentication_support_tokenapi" class="mo_api_authentication_common_div_css"> -->
                        <div  >
                            <h4 >Universal API Key: <span style="color: orange;font-size: 14px;">[PREMIUM]</span> </h4>
                            <br>
                            <h6>You can use the below API key to authenticate your WordPress REST APIs.</h6>
                            

                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    <h4 style="font-size:16px;">API Key : </h4>
                                </div>
                                <div class="col-md-8">
                                    <div class="mo_api_auth_bearer_token_button_wrap">
                                        <input id="mo_api_auth_bearer_token" class="mo_api_auth_bearer_token_input" type="password" readonly placeholder="Please click below button to Generate API Key" value="" readonly>&nbsp;
                                        <input type="button" class="btn btn-info"  value="show"  >
                                    </div>

                                    <br>
                                    <a id="regeneratetoken" name="action" style="cursor:pointer;font-size:14px" ><span style="color: blue;"><b>Generate New Key</b></span></a>

                                </div>

                            </div>


                            <!-- </div> -->
                        <!-- </div> -->
                    </div>

                    <hr>
                    <br>
                    <div class="row">
                    <div class="col-md-6">

                    <?php
                    $restricted = array();
                    
                    ?>
                        

                        <label class="mo_custom_api_labels">Choose HTTP Methods which you want to restrict from public access : <span style="color: orange;font-size: 14px;">[PREMIUM]</span></label>
                            <input type="checkbox" id="get_check" name="get_check" value="GET" disabled >
                            <label for="get_check"> GET </label><br>
                            <input type="checkbox" id="post_check" name="post_check" value="POST" disabled>
                            <label for="post_check"> POST</label><br>
                          <input type="checkbox" id="put_check" name="put_check" value="PUT" disabled>
                            <label for="put_check"> PUT</label><br>
                            <input type="checkbox" id="del_check" name="del_check" value="Delete" disabled>
                            <label for="del_check"> DELETE</label><br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" class="btn btn-primary" id="restricted_http" name="restricted_http" style="margin-bottom: 10px;" value="Save">
                        
                    </div>
                    <div class="col-md-6"></div>

                    </div>

                </div>
                <div class="col-md-5" >
                    <div class="mo_support_layout" style="border:.1rem solid #bfc4c8;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-style:solid;">
                        <div>
                            <h3>Contact Us</h3>
                            <p>Need any help? Couldn't find an answer in FAQ?<br>Just send us a query so we can help you.</p>
                            <form method="post" action=""><?php wp_nonce_field('CheckNonce', 'submit_contact_us'); ?>
                                <input type="hidden" name="option" value="custom_api_wp_contact_us_query_option" />
                                <table class="mo_settings_table">
                                    <tr>
                                        <td><input type="email" class="mo_table_textbox" required name="custom_api_wp_contact_us_email" placeholder="Enter email here" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="tel" id="contact_us_phone" pattern="[\+]\d{11,14}|[\+]\d{1,4}[\s]\d{9,10}" placeholder="Enter phone here" class="mo_table_textbox" name="custom_api_wp_contact_us_phone" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><textarea class="mo_table_textbox" onkeypress="custom_api_wp_valid_query(this)" placeholder="Enter your query here" onkeyup="custom_api_wp_valid_query(this)" onblur="custom_api_wp_valid_query(this)" required name="custom_api_wp_contact_us_query" rows="4" style="resize: vertical;"></textarea></td>
                                    </tr>
                                </table>
                                <div style="text-align:center;">
                                    <input type="submit" name="submit" style="margin:15px; width:100px;" class="button button-primary button-large" />
                                </div>
                                <p>If you want custom features in the plugin, just drop an email at <a href="mailto:info@xecurify.com">info@xecurify.com</a>.</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

<?php
}
