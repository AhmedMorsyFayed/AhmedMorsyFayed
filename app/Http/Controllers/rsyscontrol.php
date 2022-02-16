<?php


namespace App\Http\Controllers;


use App\Export\brokerReport;
use App\Export\Report;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;
use Maatwebsite\Excel\Facades\Excel;
use \Datetime;
class rsyscontrol
{
    /* view to show form of change password for user himself*/
    public function showveiw()
    {
        return view('changepassword');
    }
    // change password function
    public function changepass(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            echo " <script >alert('Your current password does not matches with the password you provided. Please try again '); window.location = './changepassword'</script>";

        } elseif ((strcmp($request->get('password'), $request->get('password_confirmation')) == 0) And (strcmp($request->get('current-password'), $request->get('password')) == 0)) {
            echo " <script >alert('New Password is  the same as your current password.  Please try again'); window.location = './changepassword'</script>";
        } elseif (!(strcmp($request->get('password'), $request->get('password_confirmation')) == 0)) {
            echo " <script >alert('New Password is not the same as your confirmation password. Please choose a different password'); window.location = './changepassword'</script>";
        } else {
            $user = Auth::user();
            $user->password = bcrypt($request->get('password'));

            $user->save();
            echo " <script >alert('password changed successfully '); window.location = './home';</script>";

        }
    }
//function return view cancelploicy to cancel policy
    public function showformacanecl()
    {
        return view('Cancelploicy');
    }

//function to doing cancel policy
    public function doingcancel(Request $request)
    {
        $serial = $request->input('serialnum');
        $items5 = array();
        $sql5 = DB::select('SELECT * FROM policies where serialnum=?', [$serial]);
        foreach ($sql5 as $user) {
            $from4=$user->serialnum;
            $items5[] = $from4;
        }
//check if serial number is in database to cancel using it
        if (in_array($serial,$items5)) {
            DB::update('update policies set Manager ="Cancel" where serialnum=? ', [$serial]);
            echo " <script >alert('The Policy has been successfully Canceled '); window.location = './Cancelploicy';</script>";

        }else{
            echo " <script >alert('There is no serial number with this number '); window.location = './Cancelploicy';</script>";
        }

    }
    //function to export report of policies
    public function Export()
    {
        return view('advancedpolicies');
    }

    // function to do exporting report of policies
    public function Report(Request $request)
    {
        $company = $request->input('company');
        $life = $request->input('life');
        $nonlife = $request->input('nonlife');
        $from = $request->input('from');
        $to = $request->input('to');

        //choose type of company
        if($company == 'nonlife'){
            $Rename = 'non life';
        }else{
            $Rename = 'life';
        }


       if($life == Null){
           return Excel::download(new Report($Rename, $nonlife, $from,$to), "Rsys-$Rename-$from.xlsx");
       }else{
           return Excel::download(new Report($Rename, $life, $from,$to), "Rsys-$Rename-$from.xlsx");
       }


    }
    //function to return view to register
    public function CreateVeiw()
    {
        return view('register');
    }
    // function to register users in database
    public function createdate(Request $request)
    {
        $name = $request->input('name');
        $alis = $request->input('alis');
        $username = $request->input('username');
        $level = $request->input('level');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmed = $request->input('confirmed');
        $creation = date(" y-m-d h:m:s");
        $items1 = array();
        $items2 = array();
        $items3 = array();
        $items4 = array();
        $sql = DB::select('SELECT * FROM users ');
        foreach ($sql as $user) {
            $def1=$user->name;
            $items1[] = $def1;
            $def2=$user->username;
            $items2[] = $def2;
            $def3=$user->email;
            $items3[] = $def3;
            $def4=$user->alis;
            $items4[] = $def4;
        }
        //check if name in database
        if (in_array($name,$items1)) {
            echo " <script >alert('This Name already exists, please choose another Name '); window.location = './register';</script>";
        } elseif (in_array($username,$items2)) {//check if username in database
            echo " <script >alert('This UserName already exists, please choose another UserName '); window.location = './register';</script>";
        } elseif (in_array($alis,$items4)) {//check if alias in database
            echo " <script >alert('This Alias UserName already exists, please choose another Alias UserName '); window.location = './register';</script>";
        } elseif (in_array($email,$items3)) {//check if email in database
            echo " <script >alert('This Email already exists, please choose another Email '); window.location = './register';</script>";
        }elseif (!(strcmp($password, $confirmed) == 0)) {
            echo " <script >alert('New Password is not the same as your confirmation password. Please choose a different password'); window.location = './register'</script>";
        }else {//insert user in database
            $data = array('name' => $name,'username' => $username,'level'=> $level,'email' => $email,'alis' => $alis,'password' => bcrypt($password),'created_at' => $creation);
            DB::table('users')->insert($data);

            echo " <script >alert('User registered successfully'); window.location = './register';</script>";

        }
    }

    //function to return view to reset password
    public function resetVeiw($id)
    {
        $users = DB::select('select * from users where id = ?', [$id]);
        return view('doreset', ['users' => $users]);
    }//function to do reseting password
    public function resetdoing(Request $request,$id)
    {

        $password = $request->input('password');
        $confirmed = $request->input('password_confirmation');

        if (!(strcmp($password, $confirmed) == 0)) {
            echo " <script >alert('New Password is not the same as confirmation password. Please choose a different password'); window.location = './$id'</script>";
        }else {
            DB::update('update users set password =? where id=?', [bcrypt($password), $id]);
            DB::update('update users set Loginnum =0 where id=?', [$id]);

            echo " <script >alert('password changed successfully ');window.location.href = '../../resetpassword';  </script>";
        }


    }
    //function to return view to insert daily policies
    public function reurnhome ()
    {
        return view('home');
    }
    //function to return view that force user to change his password in first login
    public function forcechange()
    {
        return view('loginn');
    }
    // change password function
    public function forcechangefun(Request $request)
    {
        if ((Hash::check($request->get('password'), Auth::user()->password))) {
            echo " <script >alert('New Password is  the same as your current password.  Please try again'); window.location = './loginn'</script>";
        }elseif (!(strcmp($request->get('password'), $request->get('password_confirmation')) == 0)) {
            echo " <script >alert('New Password is not the same as your confirmation password. Please Try Again'); window.location = './loginn'</script>";
        } else {
            $user = Auth::user();
            $user->password = bcrypt($request->get('password'));
            $user->Loginnum = 1;
            $user->save();
            echo " <script >alert('password changed successfully '); window.location = './home';</script>";


        }
    }
    //function to return view that display information of policy to approve
    public function display($id)
    {
        $users = DB::select('select * from policies where id=? ', [$id]);
        return view('print', ['users' => $users]);
    }
//function to get report of broker from database
    public function brokerReport(Request $request)
    {
        $agentcode = $request->input('agent_code');
        $agentname = $request->input('agent_name');
        $Monthfrom = $request->input('Monthfrom');
        $yearfrom = $request->input('yearfrom');
        $MonthTo = $request->input('MonthTo');
        $yearTo = $request->input('yearTo');
        $From=$yearfrom."-".$Monthfrom."-"."01";
        $To=$yearTo."-".$MonthTo."-"."01";
            return Excel::download(new brokerReport($agentcode, $agentname, $From,$To), "Broker Commission-$agentname-.xlsx");
    }

    //function to insert information of broker commission in database
    public function insertbroker(Request $request)
    {
        $agentcodeee = $request->input('agent_code');
        $status ="Pending";
        $agent_code=$_POST['agent_code'];
        $agent_name=$_POST['agent_name'];
        $agent_pin=$_POST['agent_pin'];
        $operation_type=$request->input('operation_type');
        $check_on=$request->input('check_on');
        $bank_acc=$request->input('bank_acc');
        $check_no=$request->input('check_no');
        $Currency=$request->input('Currency');
        $reason=$request->input('reason');
        $newDate = date("d-m-Y");
        $Month=$_POST['Month'];
        $year=$_POST['year'];
        $report=$year."-".$Month."-"."01";
        $motor=$_POST['motor'];
        $medical=$_POST['medical'];
        $accident=$_POST['accident'];
        $marine=$_POST['marine'];
        $property=$_POST['property'];
        $engineering=$_POST['engineering'];
        $travel=$_POST['travel'];
        $motorearly=$_POST['motorearly'];
        $medicalearly=$_POST['medicalearly'];
        $accidentearly=$_POST['accidentearly'];
        $marineearly=$_POST['marineearly'];
        $propertyearly=$_POST['propertyearly'];
        $engineeringearly=$_POST['engineeringearly'];
        $travelearly=$_POST['travelearly'];
        $total=$_POST['total'];
        $tax=$_POST['tax'];
        $totaltax=$_POST['totaltax'];
        $TaxAmount=$_POST['taxes_amount'];
        $creation = date(" y-m-d ");
        $serialDate=date(" Ym");
        $serial =rand(10,10000);
        $result = $serialDate . $serial;
        $name=Auth::user()->name;

        //if statment for remove , from nubers to insert in database
        if (str_contains($motor, ',')) {
            $motorr =str_ireplace(',', '', $motor);
        }else{
            $motorr =$motor;
        }
        if (str_contains($marine, ',')) {
            $marinee =str_ireplace(',', '', $marine);
        }else{
            $marinee =$marine;
        }
        if (str_contains($totaltax, ',')) {
            $totaltaxx =str_ireplace(',', '', $totaltax);
        }else{
            $totaltaxx =$totaltax;
        }
        if (str_contains($medical, ',')) {
            $medicall =str_ireplace(',', '', $medical);
        }else{
            $medicall =$medical;
        }

        if (str_contains($accident, ',')) {
            $accidentt =str_ireplace(',', '', $accident);
        }else{
            $accidentt =$accident;
        }

        if (str_contains($property, ',')) {
            $propertyy =str_ireplace(',', '', $property);
        }else{
            $propertyy =$property;
        }
        if (str_contains($travel, ',')) {
            $travell =str_ireplace(',', '', $travel);
        }else{
            $travell =$travel;
        }
        if (str_contains($total, ',')) {
            $totall =str_ireplace(',', '', $total);
        }else{
            $totall =$total;
        }
        if (str_contains($engineering, ',')) {
            $engineeringg =str_ireplace(',', '', $engineering);
        }else{
            $engineeringg =$engineering;
        }
        if (str_contains($motorearly, ',')) {
            $motorrearly =str_ireplace(',', '', $motorearly);
        }else{
            $motorrearly =$motorearly;
        }
        if (str_contains($marineearly, ',')) {
            $marineeearly =str_ireplace(',', '', $marineearly);
        }else{
            $marineeearly =$marineearly;
        }
        if (str_contains($medicalearly, ',')) {
            $medicallearly =str_ireplace(',', '', $medicalearly);
        }else{
            $medicallearly =$medicalearly;
        }

        if (str_contains($accidentearly, ',')) {
            $accidenttearly =str_ireplace(',', '', $accidentearly);
        }else{
            $accidenttearly =$accidentearly;
        }

        if (str_contains($propertyearly, ',')) {
            $propertyyearly =str_ireplace(',', '', $propertyearly);
        }else{
            $propertyyearly =$propertyearly;
        }
        if (str_contains($travelearly, ',')) {
            $travellearly =str_ireplace(',', '', $travelearly);
        }else{
            $travellearly =$travelearly;
        }
        if (str_contains($engineeringearly, ',')) {
            $engineeringgearly =str_ireplace(',', '', $engineeringearly);
        }else{
            $engineeringgearly =$engineeringearly;
        }


//sql laravel to insert information of broker in database
        $data = array('serial' => $result,'status' => $status,'Agentcode' => $agent_code,'AgentName' => $agent_name,'AgentPin' => $agent_pin,
            'DateofPayment' => $creation,'Month' => $Month,'Year'=>$year,'GetReport' => $report,'Reason' => $reason,'Currency' => $Currency,'Checkno' => $check_no,
            'Medical' => $medicall,'Operationtype' => $operation_type,'BankAccount' => $bank_acc,'Checkon' => $check_on,
            'Motor' => $motorr,'Accident' => $accidentt,'Engineering' => $engineeringg,'property' => $propertyy,'travel' => $travell,'marine' => $marinee,
            'Motorearly' => $motorrearly,'Accidentearly' => $accidenttearly,'Engineeringearly' => $engineeringgearly,
            'propertyearly' => $propertyyearly,'travelearly' => $travellearly,'marineearly' => $marineeearly,'Medicalearly' => $medicalearly,
            'total' => $totall,'tax' => $tax,'net' => $totaltaxx,'User' => $name,'TaxAmount'=>$TaxAmount);
        DB::table('broker')->insert($data);

        echo " <script >alert('Broker Has Been Registered successfully'); window.location = './broker';</script>";

    }//function that approve broker from manager in database
    public function approvebroker($id)
    {
        $name=Auth::user()->name;

        DB::update('update broker set status ="Approve" , PaymentManager = ? where id=?', [$name,$id]);
        echo " <script >alert('Broker Has Been Approved successfully'); window.location = '../../pending';</script>";

    }
    //function that print broker from manager in database
    public function printbroker($id)
    {
        $broker = DB::select('select * from broker where id=? ', [$id]);
        return view('savebroker', ['broker' => $broker]);

    }
    //function that return view to update information of broker
    public function Updatebroker($id)
    {
        $broker = DB::select('select * from broker where id=? ', [$id]);
        return view('Updatebroker', ['broker' => $broker]);

    }
//function that update information of broker
    public function DoUpdate(Request $request,$id )
    {

  //      $id=$request->input('id');

        $agent_code=$request->input('agent_code');
        $agent_name=$request->input('agent_name');
        $agent_pin=$request->input('agent_pin');
        $Month=$request->input('Month');
        $year=$request->input('year');
        $report=$year."-".$Month."-"."01";
        $motor=$request->input('motor');
        $medical=$request->input('medical');
        $accident=$request->input('accident');
        $marine=$request->input('marine');
        $property=$request->input('property');
        $engineering=$request->input('engineering');
        $travel=$request->input('travel');
        $motorearly=$request->input('motorearly');
        $medicalearly=$request->input('medicalearly');
        $accidentearly=$request->input('accidentearly');
        $marineearly=$request->input('marineearly');
        $propertyearly=$request->input('propertyearly');
        $engineeringearly=$request->input('engineeringearly');
        $travelearly=$request->input('travelearly');
        $total=$request->input('total');
        $tax=$request->input('tax');
        $totaltax=$request->input('totaltax');
        $operation_type=$request->input('operation_type');
        $check_on=$request->input('check_on');
        $bank_acc=$request->input('bank_acc');
        $check_no=$request->input('check_no');
        $Currency=$request->input('Currency');
        $reason=$request->input('reason');
        $TaxAomunt=$request->input('taxes_amount');
//sql that update information of broker in database
        DB::update('update broker set Agentcode=?,Agentname =?,AgentPin =?,Operationtype=?,BankAccount=?,Checkon=?,
                  Month=?,Year=?,GetReport=?,Medical=?,
                  Motor=?,Accident=?,Engineering=?,property=?,travel=?,marine=?,Medicalearly=?,Motorearly=?,Accidentearly=?,
                  Engineeringearly=?,propertyearly=?,travelearly=?,marineearly=?,total=?,tax=?,net=?,
                  Reason =? ,Currency =? ,Checkno=?,TaxAmount=?
                  where id=?', [$agent_code,$agent_name,$agent_pin,$operation_type,$bank_acc,$check_on,$Month,$year,
            $report,$medical,$motor,$accident,$engineering,
            $property,$travel,$marine,$medicalearly,$motorearly,$accidentearly,$engineeringearly,
            $propertyearly,$travelearly,$marineearly,$total,$tax,$totaltax,$reason,$Currency,$check_no,$TaxAomunt,$id]);
        echo " <script >alert('Broker Has Been Updated successfully'); window.location = '../../pending';</script>";


    }
    //function to delete user from database
    public function delete($id)
    {

        DB::update('delete from users where id =?', [$id]);
        echo " <script >alert('User has been successfully deleted  ');window.location.href = '../../resetpassword';  </script>";
    }
// function to insert daily commission
    public function insertdaily(Request $request)
    {

        $company=$request->input('company');
        $sales_channel=$request->input('sales_channel');
        $agent_code=$request->input('agent_code');
        $agent_name=$request->input('agent_name');
        $agent_pin=$request->input('agent_pin');
        $introducer_code=$request->input('introducer_code');
        $product_code=$request->input('product_code');
        $policy_no=$request->input('policy_no');
        $Endors_no=$request->input('Endors_no');
        $operation_type=$request->input('operation_type');
        $check_no=$request->input('check_no');
        $Currency=$request->input('Currency');
        $reason=$request->input('reason');
        $check_on=$request->input('check_on');
        $bank_acc=$request->input('bank_acc');
        $status=$request->input('status');

        $paid_Date=$request->input('paid_Date');
        $newDate = date("d-m-Y", strtotime($paid_Date));
        $net_prem=$request->input('net_prem');
        $due_Rate=$request->input('due_Rate');
        $due_Comm=$request->input('due_Comm');
        $early=$request->input('early');
        $extra_comm=$request->input('extra_comm');
        $taxes=$request->input('taxes');
        $taxesAmount=$request->input('taxes_amount');
        $total=$request->input('total');
        $dayOfWeek = date('l');


        $serialDate=date(" Ym");
        $serial =rand(10,10000);
        $result = $serialDate . $serial;
        $name=Auth::user()->name;
        $username = Auth::user()->alis;

//if statments to remove , from inputs number
        if (str_contains($net_prem, ',')) {
            $netprem =str_ireplace(',', '', $net_prem);
        }else{
            $netprem =$net_prem;
        }

        if (str_contains($due_Comm, ',')) {
            $dueComm =str_ireplace(',', '', $due_Comm);
        }else{
            $dueComm =$due_Comm;
        }

        if (str_contains($extra_comm, ',')) {
            $extracomm =str_ireplace(',', '', $extra_comm);
        }else{
            $extracomm =$extra_comm;
        }
        if (str_contains($taxes, ',')) {
            $taxess =str_ireplace(',', '', $taxes);
        }else{
            $taxess =$taxes;
        }
        if (str_contains($total, ',')) {
            $totall =str_ireplace(',', '', $total);
        }else{
            $totall =$total;
        }
        if($bank_acc == Null){
            $bankacc =0;
        }else{
            $bankacc =$bank_acc;
        }
        $PlocyNumberArray = array();
        $EndorsNumberArray = array();

        $Policies = DB::select('SELECT * FROM policies ');
        foreach ($Policies as $Policy) {
            $PlocyNumber=$Policy->policynumber;
            $EndorsNumber=$Policy->EndorsNumber;
            $PlocyNumberArray []=$PlocyNumber;
            $EndorsNumberArray[] = $EndorsNumber;
        }


    //    if((in_array($policy_no,$PlocyNumberArray)) and (in_array($Endors_no,$EndorsNumberArray)) ){
     //       echo " <script >alert('The Policy Number And Endors Number are duplicated in the databases. Please choose another Endors Number or Check Your Policy Number'); window.history.back();</script>";
     //   }else{
            //insert daily commission information in database
            $data = array('serialnum' => $result,'Operationtype' => $operation_type,'BankAccount' => $bankacc,'Checkon' => $check_on,
                'Company' => $company,'SalesChannel' => $sales_channel,'policynumber' => $policy_no,'productcode' => $product_code,'EndorsNumber' => $Endors_no,
                'Agentcode' => $agent_code,'AgentName' => $agent_name,'early' => $early,'AgentPin' => $agent_pin,'Introducercode' => $introducer_code,'DateofPayment' => $paid_Date,
                'NetPremium' => $netprem,'DueCommission' => $dueComm,'ExtraCommission' => $extracomm,'taxes' => $taxess,
                'Total' => $totall,'Reason' => $reason,'Currency' => $Currency,'Checkno' => $check_no,'DueRate' => $due_Rate,'TaxAmount' => $taxesAmount,'Status' => $status,'user' => $username,);
            DB::table('policies')->insert($data);

            echo " <script >alert('The Policy has been successfully registered'); window.location = './home';</script>";
    //    }

    }

    // function to return view that approve policy from manager

    public function approvedaily($id)
    {

       $policies = DB::select('select * from policies where id =?',[$id]);

        return view('print', ['policy' => $policies]);
    }
    // function to return view that approve policy from finance
    public function financeAprove($id)
    {
        $Name=Auth::user()->name;
        $Emails=array();
        $Policis = DB::select('SELECT email FROM users where level="Finance" ');
        foreach ($Policis as $Polcy) {
            $email=$Polcy->email;
            $Emails[]=$email;
        }
        $TO=$Emails[0];
        $now = new DateTime(null, new DateTimeZone('Africa/Cairo'));
        $creation= $now->format('Y-m-d H:i:s');


        $subjectt = "Policy approval ";
        $body = "kindly be informed that Mrs.$Name has agreed to Policy and they are waiting for Your Review
               \n  URL:http://192.168.5.73:8000  " ;
        $headers = "From: followup@arope.com.eg";
        if ( mail($TO , $subjectt, $body, $headers))  {
                //insert daily commission information in database
                DB::update('update policies set Manager ="Approve" ,ManagerName=?,creation=? where id=?',[$Name,$creation,$id]);
                echo " <script >alert('Policy Has Been Approved successfully and Email successfully sent'); window.location = '../../History';</script>";
        } else {
            DB::update('update policies set Manager ="Approve" ,ManagerName=? ,creation=? where id=?',[$Name,$creation,$id]);
            echo " <script >alert('Policy Has Been Approved successfully and Email successfully sent'); window.location = '../../History';</script>";
        }

    }
    // function to return daily information to save page to print
    public function printpolicy($id)
    {
        $policies = DB::select('select * from policies where id =?',[$id]);
        return view('save', ['policies' => $policies]);

    }    // function to return daily information to review page to print
    public function reviewdaily($id)
    {
        $policies = DB::select('select * from policies where id =?',[$id]);
        return view('Review', ['policy' => $policies]);
    }
    // function that doing review the policy
    public function financeAprov($id)
    {
        $Name=Auth::user()->name;
        DB::update('update policies set FinanceStatus ="Review" ,FinanceUser=? where id=?',[$Name,$id]);
        echo " <script >alert('Policy Has Been Reviewed successfully'); window.location = '../../home';</script>";



    }
    // function to return daily information to update policy page
    public function UpdatePolicy($id)
    {
        $policy = DB::select('select * from policies where id=? ', [$id]);
        return view('UpdatePolicy', ['policy' => $policy]);

    }
    // function that update daily information policy using id
    public function DoUpdatePolicy(Request $request,$id )
    {

        $company=$request->input('company');
        $sales_channel=$request->input('sales_channel');
        $agent_code=$request->input('agent_code');
        $agent_name=$request->input('agent_name');
        $agent_pin=$request->input('agent_pin');
        $introducer_code=$request->input('introducer_code');
        $product_code=$request->input('product_code');
        $policy_no=$request->input('policy_no');
        $Endors_no=$request->input('Endors_no');
        $operation_type=$request->input('operation_type');
        $check_no=$request->input('check_no');
        $check_on=$request->input('check_on');
        $bank_acc=$request->input('bank_acc');
        $status=$request->input('status');
        $Currency=$request->input('Currency');
        $paid_Date=$request->input('paid_Date');
        $net_prem=$request->input('net_prem');
        $due_Rate=$request->input('due_Rate');
        $due_Comm=$request->input('due_Comm');
        $early=$request->input('early');
        $extra_comm=$request->input('extra_comm');
        $taxes=$request->input('taxes');
        $taxesAmount=$request->input('taxes_amount');
        $total=$request->input('total');
        $reason=$request->input('reason');
        $level=Auth::user()->level;
        $managerapprove=array();
        $Policies = DB::select('select * from policies where id=? ', [$id]);
        foreach ($Policies as $Policy) {
            $Approve=$Policy->Manager;
            $managerapprove []=$Approve;

        }
        $x=$managerapprove[0];



            //sql to update policy in database
        DB::update('update policies set SalesChannel=?,Company =?,Operationtype =?,Status =?, Agentcode =?, AgentName=?,
            AgentPin =?, productcode=?, policynumber=?, EndorsNumber=?, Checkon=?, BankAccount=?, DateofPayment=?,
            DueCommission =?,early =?,NetPremium=? , ExtraCommission =?, Total=? , Reason=? , Currency=?, Introducercode=?,Checkno =?,DueRate =?,
                    TaxAmount =?,taxes=?

                  where id=?', [$sales_channel,$company,$operation_type,$status,$agent_code,$agent_name,
            $agent_pin,$product_code,$policy_no,$Endors_no,$check_on,$bank_acc,$paid_Date,
            $due_Comm,$early,$net_prem,$extra_comm,$total,$reason,$Currency,$introducer_code,$check_no,$due_Rate,$taxesAmount,$taxes,$id]);


        if ($level == "Finance"){
            echo " <script >alert('Policy Has Been Updated successfully'); window.location = '../../home';</script>";

        }elseif(($x=="Approve" or $x=="Cancel")){
            echo " <script >alert('Policy Has Been Updated successfully'); window.location = '../../AllPolicies';</script>";

        }else{
            echo " <script >alert('Policy Has Been Updated successfully'); window.location = '../../History';</script>";

        }

    }
    // function that cancel daily information policy by manager
    public function CanacelBroker($id)
    {
        DB::update('update broker set status ="Cancel" where id =?', [$id]);
        echo " <script >alert('Broker has been successfully Canceled ');window.location.href = '../../History';  </script>";
    }
    // function that cancel daily information policy by finance
    public function CanacelReview($id)
    {
        DB::update('update policies set FinanceStatus ="pending" where id =?', [$id]);
        echo " <script >alert('Policy has been successfully Canceled and return BusinessDevelopment Team  ');window.location.href = '../../History';  </script>";
    }
    // function that approve daily information policy by manager after cancel it
     public function financeAprovee($id)
    {
        $Name=Auth::user()->name;
        DB::update('update policies set Manager ="Approve" ,ManagerName=? where id=?',[$Name,$id]);

        echo " <script >alert('Policy Has Been Approved successfully'); window.location = '../../AllPolicies';</script>";
    }

    public function insertnote(Request $request)
    {
        $id=$request->input('TaskID');
        $Note=$request->input('note');
        $serial=array();
        $policyy=array();
        $agent=array();
        $Policies = DB::select('select * from policies where id=? ', [$id]);
        foreach ($Policies as $Policy) {
            $ser=$Policy->serialnum;
            $serial []=$ser;
            $pol=$Policy->policynumber;
            $policyy []=$pol;
            $ag=$Policy->AgentName;
            $agent []=$ag;

        }
        $Serial=$serial[0];
        $PolicyNumber=$policyy[0];
        $AgentName=$agent[0];
        $UserName=Auth::user()->name;
        $creation=date("Y-m-d");




       // $to_emaill = "ahmed.fayed@arope.com.eg";
     //   $name=Auth::user()->name;
        $subjectt = "Note About Policy $PolicyNumber ";
        $body = "kindly be informed that There is a note on the  Agent *$AgentName* Policy  and the note is \n*$Note*
               \n  URL:http://192.168.5.73:8000" ;
        $headers = "From: followup@arope.com.eg";

        if ( mail(("ali.saad@arope.com.eg,merna.adham@arope.com.eg") , $subjectt, $body, $headers))  {
            $data = array('Policy Number' => $PolicyNumber,'Agent Name' => $AgentName,'SerialNumber' => $Serial,'Notee' => $Note,
                'User' => $UserName,'creation' => $creation);
            DB::table('Note')->insert($data);
            echo " <script >alert('The Note has been successfully registered and Email successfully sent'); window.location = '../../home';</script>";

        } else {
            $data = array('Policy Number' => $PolicyNumber,'Agent Name' => $AgentName,'SerialNumber' => $Serial,'Notee' => $Note,
                'User' => $UserName,'creation' => $creation);
            DB::table('Note')->insert($data);
            echo " <script >alert('The Note has been successfully registered But Email Failed sent , Please call It'); window.location = '../../home';</script>";

        }

    }

    public function insertproblem(Request $request)
    {
        $id=$request->input('TaskIDd');
        $Problem=$request->input('Problem');
        $serial=array();
        $policyy=array();
        $agent=array();
        $Policies = DB::select('select * from policies where id=? ', [$id]);
        foreach ($Policies as $Policy) {
            $ser=$Policy->serialnum;
            $serial []=$ser;
            $pol=$Policy->policynumber;
            $policyy []=$pol;
            $ag=$Policy->AgentName;
            $agent []=$ag;

        }
        $Serial=$serial[0];
        $PolicyNumber=$policyy[0];
        $AgentName=$agent[0];
        $UserName=Auth::user()->name;
        $creation=date("Y-m-d");


        // $to_emaill = "ahmed.fayed@arope.com.eg";
        //   $name=Auth::user()->name;
        $subjectt = "Problem About Policy $PolicyNumber ";
        $body = "kindly be informed that There is a Problem on the  Agent *$AgentName* Policy  and the Problem is \n*$Problem*
               \n  URL:http://192.168.5.73:8000  " ;
        $headers = "From: followup@arope.com.eg";

        if ( mail(("manal.soultan@arope.com.eg") , $subjectt, $body, $headers))  {
            $data = array('Policy Number' => $PolicyNumber,'Agent Name' => $AgentName,'SerialNumber' => $Serial,'Problem' => $Problem,
                'User' => $UserName,'creation' => $creation);
            DB::table('Note')->insert($data);
            echo " <script >alert('The Problem has been successfully registered and Email successfully sent'); window.location = '../../home';</script>";
        } else {
            $data = array('Policy Number' => $PolicyNumber,'Agent Name' => $AgentName,'SerialNumber' => $Serial,'Problem' => $Problem,
                'User' => $UserName,'creation' => $creation);
            DB::table('Note')->insert($data);
            echo " <script >alert('The Problem has been successfully registered But Email Failed sent , Please call It'); window.location = '../../home';</script>";

        }

    }

    public  function upload(){


        $total = count($_FILES['upload']['name']);
        $UserName=Auth::user()->name;
        $creation=date("Y-m-d");
// Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            //get the file extension and append it to the new file name
            //Make sure we have a file path
            if ($tmpFilePath != ""){
                //Setup our new file path
                $rand =rand(10,10000);
                $filename=$_FILES['upload']['name'][$i];
                $newFilePath = "D:\Uploads\ "."$rand-" .$_FILES['upload']['name'][$i];
                move_uploaded_file($tmpFilePath, $newFilePath);
                $data = array('serial' => $rand,'filesName' => $filename,
                    'User' => $UserName,'creation' => $creation);
                DB::table('Files')->insert($data);
    }
        }
        echo " <script >alert('Files uploaded successfully'); window.location = './home';</script>";

    }

    public function downloadfile($serial)
    {
        $dir = "D:/Uploads ";
        $allFiles = scandir("$dir");
        $putFile = array();
        foreach($allFiles as $file){
            if (str_contains($file,$serial)) {
                $putFile[] = $file ;
            }
        }

        $filee=$putFile[0];
        $DownloadFile = "D:/Uploads/".$filee;

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($DownloadFile).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($DownloadFile));
        ob_clean();
        flush();

        readfile($DownloadFile);

    }
    public function setflag(Request $request){
        $id=$request->input('checkid');
        DB::update('update policies set Flag=1 where id=?',[$id]);
        echo " <script >alert(' Flag of Policy Has Been setted successfully'); window.location = './home';</script>";

    }
    public function CanacelPolicy($id)
    {
        DB::update('update policies set Manager ="Cancel" where id =?', [$id]);
        echo " <script >alert('Policy has been successfully Canceled ');window.location.href = '../../History';  </script>";
    }

    public function setflagapprove(Request $request){
        $id=$request->input('checkid');
        DB::update('update policies set Flag=0 where id=?',[$id]);
        echo " <script >alert(' Flag of Policy Has Been resetted successfully'); window.location = './Flag';</script>";

    }



}





