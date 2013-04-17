<?php 

function modify_file($src, $dest, $reg_src, $reg_rep)
{
    $in = @fopen($src, "r");
    if (! $in) {
        return $TEXT['failed-read'] . " $src";
    } 
    $i = 0;
    while (!feof($in)) {
        $file_buff1[$i++] = fgets($in, 4096);
    } 
    fclose($in);

    $lines = 0; // Keep track of the number of lines changed
    
    while (list ($bline_num, $buffer) = each ($file_buff1)) {
        $new = preg_replace($reg_src, $reg_rep, $buffer);
        if ($new != $buffer) {
            $lines++;
        } 
        $file_buff2[$bline_num] = $new;
    } 

    if ($lines == 0) {
        // Skip the rest - no lines changed
        return $TEXT['nothing-changed'];
    } 

    reset($file_buff1);
    $out_backup = @fopen($dest, "w");

    if (! $out_backup) {
        return $TEXT['failed-write'] . " $dest";
    } while (list ($bline_num, $buffer) = each ($file_buff1)) {
        fputs($out_backup, $buffer);
    } 

    fclose($out_backup);

    reset($file_buff2);
    $out_original = fopen($src, "w");
    if (! $out_original) {
        return $TEXT['failed-write'] . " $src";
    } while (list ($bline_num, $buffer) = each ($file_buff2)) {
        fputs($out_original, $buffer);
    } 

    fclose($out_original); 
    // Success!
    return "$src updated with $lines lines of changes, backup is called $dest";
} 
// Two global arrays
$reg_src = array();
$reg_rep = array();
// Setup various searches and replaces
// Scott Kirkwood
function add_src_rep($key, $rep)
{
    global $reg_src, $reg_rep; 
    // Note: /x is to permit spaces in regular expressions
    // Great for making the reg expressions easier to read
    // Ex: $pnconfig['sitename'] = stripslashes("Your Site Name");
    $reg_src[] = "/ \['$key'\] \s* = \s* stripslashes\( (\' | \") (.*) \\1 \); /x";
    $reg_rep[] = "['$key'] = stripslashes(\\1$rep\\1);"; 
    // Ex. $pnconfig['site_logo'] = "logo.gif";
    $reg_src[] = "/ \['$key'\] \s* = \s* (\' | \") (.*) \\1 ; /x";
    $reg_rep[] = "['$key'] = '$rep';"; 
    // Ex. $pnconfig['pollcomm'] = 1;
    $reg_src[] = "/ \['$key'\] \s* = \s* (\d*\.?\d*) ; /x";
    $reg_rep[] = "['$key'] = $rep;";
} 

function show_error_info()
{
    global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $dbtabletype;

    echo "<br/><br/><b>" . _SHOW_ERROR_INFO_1 . "<br/>";
	echo <<< EOT
        <tt>
        \$pnconfig['dbserver'] = '$dbserver';<br/>
        \$pnconfig['dbtype'] = '$dbtype';<br/>
        \$pnconfig['dbhost']  = '$dbhost';<br/>
        \$pnconfig['dbuname'] = '$dbuname';<br/>
        \$pnconfig['dbpass'] = '$dbpass';<br/>
        \$pnconfig['dbname'] = '$dbname';<br/>
        \$pnconfig['prefix'] = '$prefix';<br/>
        </tt>
EOT;
} 
// Update the config.php file with the database information.
function update_config_php($dbserver, $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype)
{
	global $reg_src, $reg_rep; 

	add_src_rep("dbserver", $dbserver);
    add_src_rep("dbhost", $dbhost);
    add_src_rep("dbuname", $dbuname);
    add_src_rep("dbpass", $dbpass);
    add_src_rep("dbname", $dbname);
    add_src_rep("prefix", $prefix);
    add_src_rep("dbtype", $dbtype);
    if (@strstr($HTTP_ENV_VARS["OS"], "Win")) {
        add_src_rep("system" , '1');
    } else {
        add_src_rep("system", '0');
    } 
    add_src_rep("encoded", '1');


    $ret = modify_file(CMX_CONFIG_FILE, CMX_CONFIG_FILE, $reg_src, $reg_rep);

    if (preg_match("/Error/", $ret)) {
        show_error_info();
    } 
} 

?>