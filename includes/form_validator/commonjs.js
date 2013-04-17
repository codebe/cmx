// JavaScript Document
// Progress Billingf System Common JS

// activepage and page numbering
/**
 * marks all rows and selects its first checkbox inside the given element
 * the given element is usaly a table or a div containing the table or tables
 *
 * @param    container    DOM element
 */
 function strReplace(repItem,strValue)
{
	while (strValue.indexOf(repItem) > -1)
	{
		strValue=strValue.replace(repItem,"");
	}
	return strValue;
}
function markAllRows( container_id ) {
    var rows = document.getElementById(container_id).getElementsByTagName('tr');
    var unique_id;
    var checkbox;

    for ( var i = 0; i < rows.length; i++ ) {

        checkbox = rows[i].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' ) {
            unique_id = checkbox.name + checkbox.value;
            if ( checkbox.disabled == false ) {
                checkbox.checked = true;
            }
        }
    }

    return true;
}

/**
 * marks all rows and selects its first checkbox inside the given element
 * the given element is usaly a table or a div containing the table or tables
 *
 * @param    container    DOM element
 */
function unMarkAllRows( container_id ) {
    var rows = document.getElementById(container_id).getElementsByTagName('tr');
    var unique_id;
    var checkbox;

    for ( var i = 0; i < rows.length; i++ ) {

        checkbox = rows[i].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' ) {
            unique_id = checkbox.name + checkbox.value;
            checkbox.checked = false;
        }
    }

    return true;
}

function convertCommaBasedToNum(amount) {
	var i = String(amount);
	var k =0;
	var num="";
	
	if (i.indexOf(",") != -1) {
		i=i.split(",");
		for (k=0;k<i.length;k++) {
			num+=""+i[k];
		}
	} else {
		num=amount;		
	}
	
	return (parseFloat(num));
}

function MM_jumpMenu(targ,selObj,restore,e)
{ //v3.0
	var str=e;
  if (str=="act")//this for page numbering purpose. It to prevent pop up message when you change entry per page
  {
  	  //this is for active page
	  if (!confirm ('Are you sure? All the active page will be deleted.'))
	  {
		return false;
	  }
  }
  
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

// open new window
function openWindow(url,w,h,tb,stb,l,mb,sb,rs,x,y){
var t=(document.layers)? ',screenX='+x+',screenY='+y: ',left='+x+',top='+y; //A LITTLE CROSS-BROWSER CODE FOR WINDOW POSITIONING
tb=(tb)?'yes':'no'; stb=(stb)?'yes':'no'; l=(l)?'yes':'no'; mb=(mb)?'yes':'no'; sb=(sb)?'yes':'no'; rs=(rs)?'yes':'no';
var x=window.open(url, 'newWin'+new Date().getTime(), 'scrollbars='+sb+',width='+w+',height='+h+',toolbar='+tb+',status='+stb+',menubar='+mb+',links='+l+',resizable='+rs+t);
x.focus();
}


function CurrencyFormatted(amount)
{
	var i = parseFloat(amount);
	if(isNaN(i)) { i = 0.00; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	i = parseInt((i + .005) * 100);
	i = i / 100;
	s = new String(i);
	if(s.indexOf('.') < 0) { s += '.00'; }
	if(s.indexOf('.') == (s.length - 2)) { s += '0'; }
	s = minus + s;
	return s;
}
//

function CommaFormatted(amount)
{
	var delimiter = ","; // replace comma if desired
	var a = amount.split('.',2)
	var d = a[1];
	var i = parseInt(a[0]);
	if(isNaN(i)) { return ''; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	var n = new String(i);
	var a = [];
	while(n.length > 3)
	{
		var nn = n.substr(n.length-3);
		a.unshift(nn);
		n = n.substr(0,n.length-3);
	}
	if(n.length > 0) { a.unshift(n); }
	n = a.join(delimiter);
	if(d.length < 1) { amount = n; }
	else { amount = n + '.' + d; }
	amount = minus + amount;
	return amount;
}


// mail template listing
function CheckAll(checked)
{
	len = document.listing.elements.length;
	var i=0;
	for( i=0; i<len; i++)
	{
		if (document.listing.elements[i].name=='templatecode')
		{
			document.listing.elements[i].checked=checked;
		}
	}
}


// -------------------------------------------------------------------
// Virtual Pagination Script- By Dynamic Drive, available at: http://www.dynamicdrive.com
// Last updated: Dec 11th, 2006
//
// PUBLIC: virtualpaginate(className, chunksize)
// Main Virtual Paginate Object function.
// -------------------------------------------------------------------

function virtualpaginate(className, chunksize, elementType){
var elementType=(typeof elementType=="undefined")? "div" : elementType //The type of element used to divide up content into pieces. Defaults to "div"
this.pieces=virtualpaginate.collectElementbyClass(className, elementType) //get total number of divs matching class name
//Set this.chunksize: 1 if "chunksize" param is undefined, "chunksize" if it's less than total pieces available, or simply total pieces avail (show all)
this.chunksize=(typeof chunksize=="undefined")? 1 : (chunksize>0 && chunksize <this.pieces.length)? chunksize : this.pieces.length
this.pagecount=Math.ceil(this.pieces.length/this.chunksize) //calculate number of "pages" needed to show the divs
this.showpage(-1) //show no pages (aka hide all)
this.currentpage=0 //Having hidden all pages, set currently visible page to 1st page
this.showpage(this.currentpage) //Show first page
}

// -------------------------------------------------------------------
// PRIVATE: collectElementbyClass(classname)- Returns an array containing DIVs with the specified classname
// -------------------------------------------------------------------

virtualpaginate.collectElementbyClass=function(classname, element){ //Returns an array containing DIVs with specified classname
var classnameRE=new RegExp("(^|\\s+)"+classname+"($|\\s+)", "i") //regular expression to screen for classname within element
var pieces=[]
var alltags=document.getElementsByTagName(element)
for (var i=0; i<alltags.length; i++){
if (typeof alltags[i].className=="string" && alltags[i].className.search(classnameRE)!=-1)
pieces[pieces.length]=alltags[i]
}
return pieces
}

// -------------------------------------------------------------------
// PUBLIC: showpage(pagenumber)- Shows a page based on parameter passed (0=page1, 1=page2 etc)
// -------------------------------------------------------------------

virtualpaginate.prototype.showpage=function(pagenumber){
var totalitems=this.pieces.length //total number of broken up divs
var showstartindex=pagenumber*this.chunksize //array index of div to start showing per pagenumber setting
var showendindex=showstartindex+this.chunksize-1 //array index of div to stop showing after per pagenumber setting
for (var i=0; i<totalitems; i++){
if (i>=showstartindex && i<=showendindex)
this.pieces[i].style.display="block"
else
this.pieces[i].style.display="none"
}
this.currentpage=parseInt(pagenumber)
if (this.cpspan) //if <span class="paginateinfo> element is present, update it with the most current info (ie: Page 3/4)
this.cpspan.innerHTML='Page '+(this.currentpage+1)+'/'+this.pagecount
}

// -------------------------------------------------------------------
// PRIVATE: paginate_build_() methods- Various methods to create pagination interfaces
// paginate_build_selectmenu(paginatedropdown)- Accepts an empty SELECT element and turns it into pagination menu
// paginate_build_regularlinks(paginatelinks)- Accepts a collection of links and screens out/ creates pagination out of ones with specific "rel" attr
// paginate_build_flatview(flatviewcontainer)- Accepts <span class="flatview"> element and replaces it with sequential pagination links
// paginate_build_cpinfo(cpspan)- Accepts <span class="paginateinfo"> element and displays current page info (ie: Page 1/4)
// -------------------------------------------------------------------

virtualpaginate.prototype.paginate_build_selectmenu=function(paginatedropdown){
var instanceOfBox=this
this.selectmenupresent=1
for (var i=0; i<this.pagecount; i++)
paginatedropdown.options[i]=new Option("Page "+(i+1)+" of "+this.pagecount, i)
paginatedropdown.selectedIndex=this.currentpage
paginatedropdown.onchange=function(){
instanceOfBox.showpage(this.selectedIndex)
}
}

virtualpaginate.prototype.paginate_build_regularlinks=function(paginatelinks){
var instanceOfBox=this
for (var i=0; i<paginatelinks.length; i++){
var currentpagerel=paginatelinks[i].getAttribute("rel")
if (currentpagerel=="previous" || currentpagerel=="next" || currentpagerel=="first" || currentpagerel=="last") //screen for these "rel" values
paginatelinks[i].onclick=function(){
instanceOfBox.navigate(this.getAttribute("rel"))
return false
}
}
}

virtualpaginate.prototype.paginate_build_flatview=function(flatviewcontainer){
var instanceOfBox=this
var flatviewhtml=""

var num=8
var menu=new Array(num)
menu[1]="1. Rumah Yang Dipohon"
menu[2]="2. Keterangan Mengenai Pemohon"
menu[3]="3. Pekerjaan"
menu[4]="4. Pendapatan Bulanan"
menu[5]="5. Tanggungan"
menu[6]="6. Kediaman Sekarang"
menu[7]="7. Pemilikan Harta"
menu[8]="8. Cara Bayaran"

for (var i=0; i<num; i++)
//flatviewhtml+='<a href="#flatview" rel="'+i+'">'+(i+1)+'</a> ' //build sequential pagination links
flatviewhtml+='<a href="#flatview" rel="'+i+'">'+menu[i+1]+'</a> '


flatviewcontainer.innerHTML=flatviewhtml
this.flatviewlinks=flatviewcontainer.getElementsByTagName("a")
for (var i=0; i<this.flatviewlinks.length; i++){
this.flatviewlinks[i].onclick=function(){
instanceOfBox.flatviewlinks[instanceOfBox.currentpage].className="" //"Unhighlight" last flatview link clicked on...
this.className="selected" //while "highlighting" currently clicked on flatview link (setting its class name to "selected"
instanceOfBox.showpage(this.getAttribute("rel"))
return false
}
}
this.flatviewlinks[this.currentpage].className="selected" //"Highlight" current page
this.flatviewpresent=true //indicate flat view links are present
}

virtualpaginate.prototype.paginate_build_cpinfo=function(cpspan){
this.cpspan=cpspan
cpspan.innerHTML='Page '+(this.currentpage+1)+'/'+this.pagecount
}


// -------------------------------------------------------------------
// PRIVATE: buildpagination()- Create pagination interface by calling one or more of the paginate_build_() functions
// -------------------------------------------------------------------

virtualpaginate.prototype.buildpagination=function(divid){
var instanceOfBox=this
var paginatediv=document.getElementById(divid)
if (this.chunksize==this.pieces.length){ //if user has set to display all pieces at once, no point in creating pagination div
paginatediv.style.display="none"
return
}
var paginationcode=paginatediv.innerHTML //Get user defined, "unprocessed" HTML within paginate div
if (paginatediv.getElementsByTagName("select").length>0) //if there's a select menu in div
this.paginate_build_selectmenu(paginatediv.getElementsByTagName("select")[0])
if (paginatediv.getElementsByTagName("a").length>0) //if there are links defined in div
this.paginate_build_regularlinks(paginatediv.getElementsByTagName("a"))
var allspans=paginatediv.getElementsByTagName("span") //Look for span tags within passed div
for (var i=0; i<allspans.length; i++){
if (allspans[i].className=="flatview")
this.paginate_build_flatview(allspans[i])
else if (allspans[i].className=="paginateinfo")
this.paginate_build_cpinfo(allspans[i])
}
this.paginatediv=paginatediv
}

// -------------------------------------------------------------------
// PRIVATE: navigate(keyword)- Calls this.showpage() with the currentpage property preset based on entered keyword
// -------------------------------------------------------------------

virtualpaginate.prototype.navigate=function(keyword){
if (this.flatviewpresent)
this.flatviewlinks[this.currentpage].className="" //"Unhighlight" previous page (before this.currentpage increments)
if (keyword=="previous")
this.currentpage=(this.currentpage>0)? this.currentpage-1 : (this.currentpage==0)? this.pagecount-1 : 0
else if (keyword=="next")
this.currentpage=(this.currentpage<this.pagecount-1)? this.currentpage+1 : 0
else if (keyword=="first")
this.currentpage=0
else if (keyword=="last")
this.currentpage=this.pieces.length-1
this.showpage(this.currentpage)
if (this.selectmenupresent)
this.paginatediv.getElementsByTagName("select")[0].selectedIndex=this.currentpage
if (this.flatviewpresent)
this.flatviewlinks[this.currentpage].className="selected" //"Highlight" current page
}

function handleEnter (field, event) {
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		if (keyCode == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
				if (field == field.form.elements[i])
					break;

			for (;;)
			{
				i = (i + 1) % field.form.elements.length;

				if (field.form.elements[i].type != "hidden")
				{
					field.form.elements[i].focus();
					break;
				}
			}

			return false;
		} 
		else
		return true;
	}

function handleEnter1 (field, event) {
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		if (keyCode == 13) 
		{
			return false;
		}

		return true;
	}
function DigitsOnly(e) 
{
   var KeyCode = (e.keyCode) ? e.keyCode : e.which;
   return ((KeyCode == 8) // backspace
        || (KeyCode == 9) // tab
        || (KeyCode == 37) // left arrow
        || (KeyCode == 39) // right arrow
        || (KeyCode == 46) // delete
        || ((KeyCode > 47) && (KeyCode < 58)) // 0 - 9
   );
}
function FormatNumber(field) 
{
	
	for (x = 0; x < field.form.elements.length; x++)
		if (field == field.form.elements[x])
			break;

	amount = field.form.elements[x].value;

  amount = amount.replace(/\,/gi, '');

	var i = parseFloat(amount);
	if(isNaN(i)) { i = 0.00; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	i = parseInt((i + .005) * 100);
	i = i / 100;
	s = new String(i);
	if(s.indexOf('.') < 0) { s += '.00'; }
	if(s.indexOf('.') == (s.length - 2)) { s += '0'; }
	s = minus + s;

	amount = s;

	var delimiter = ","; // replace comma if desired
	var a = amount.split('.',2)
	var d = a[1];
	var i = parseInt(a[0]);
	if(isNaN(i)) { return ''; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	var n = new String(i);
	var a = [];
	while(n.length > 3)
	{
		var nn = n.substr(n.length-3);
		a.unshift(nn);
		n = n.substr(0,n.length-3);
	}

	if(n.length > 0) { a.unshift(n); }
	n = a.join(delimiter);
	if(d.length < 1) { amount = n; }
	else { amount = n + '.' + d; }
	amount = minus + amount;

	field.form.elements[x].value = amount;
}

function UpperCase(field) 
{
	
	for (x = 0; x < field.form.elements.length; x++)
		if (field == field.form.elements[x])
			break;

	field.form.elements[x].value = field.form.elements[x].value.toUpperCase();
}

//date = date which is want validate   --- flag_alert 0-->dont want alert message,1-->want alert message
function datevalidation(date,flag_alert) 
{

			datearrayentry = date.split("-");
			day = datearrayentry[0];
			month = datearrayentry[1];
			year = datearrayentry[2];
			
			if (date.match("^[0-9]{2}-[0-9]{2}-[0-9]{4}$") == null)
			{
					if(flag_alert=='1')
					{
							alert("You have specified an Invalid Date Format");
					}
					return null;
			}
			
			if ((month==4 || month==6 || month==9 || month==11) && day==31) 
			{
				if(month==4)
				{
						month_desc="April";
				}
				else if(month==6)
				{
						month_desc="June";
				}
				else if(month==4)
				{
						month_desc="September";
				}
				else if(month==4)
				{
						month_desc="November";
				}

				if(flag_alert=='1')
				{
					alert("Month "+month_desc+" doesn't have 31 days!");
				}
				return null
			}
			if (month == 2) 
			{ // check for february 29th
				var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
				if (day>29 || (day==29 && !isleap)) 
				{
					if(flag_alert=='1')
					{
						alert("February " + year + " doesn't have " + day + " days!");
					}
					return null; 
				}
			}
			
			if (month < 1 || month > 12) // check month range
			{ 
					if(flag_alert=='1')
					{
						alert("Month must be between 1 and 12.");
					}
					return null;
			}
			if (day < 1 || day > 31) // check date range
			{
				if(flag_alert=='1')
				{
					alert("Day must be between 1 and 31.");
				}
				return null;
			}
			
			
			return "dateisvalid";
						
}

function commaBlur(idxobject) {
				//alert(idxobject.value.replace(/,/g,""));
				var val = parseFloat(idxobject.value.replace(/,/g,""));
				
				idxobject.value = CommaFormatted(val.toFixed(2));
				
				//alert(value);
}

