// JavaScript Document
var cmxCore_blockID = 100, cmxCore_centerData, cmxCore_countBlock = 0;
var cmxCore_section = new Array();
var objAJAX;

function renderingPage(sourceData, xslLocation, container, call_function) {
	xmlData = getModel(sourceData);
	xslFile = getView(xslLocation);
	if (call_function != null) 
		Freja._aux.connect(xslFile,'onrendercomplete',call_function);
	xslFile.render(xmlData, container);
}

// First function called
function showMainIndexPage() {
	objAJAX = new XMLHttpRequest();
	objAJAX.onreadystatechange = handleStateChange;
	objAJAX.open("GET", "index.php?mode=getActiveTheme", true);
	objAJAX.send(null);
}

function handleStateChange() {
	if (objAJAX.readyState == 4) {
		if (objAJAX.status == 200) {
			var active_theme = objAJAX.responseText;
			renderingPage('index.php?mode=getListActiveMenu', 
				'themes/'+ active_theme +'/index.xsl', 'cmxContent', loadContent);
		}
	}
}

function loadContent() {
	cmxCore_blockID++;
	renderingPage('index.php?mode=getBlockData&block=content&blockID='+cmxCore_blockID, 
				  	'features/main_content/view/content.xsl', 'center_container', manageBlock);
}

function refreshLeftMenu() {
	renderingPage('index.php?mode=getListActiveMenu', 
				  	'includes/cmxcore/cmxblocks/menu.xsl', 'link_menu', blockEffect);
}

function createBlock() {	
	cmxCore_blockID++;	
	renderingPage('index.php?mode=getBlockData&block=content&blockID='+cmxCore_blockID, 
				  	'includes/cmxcore/cmxblocks/block.xsl', 'center_container', manageBlock);
}

function manageBlock() {
	if (cmxCore_countBlock < cmxCore_blockID) {
		var centerObj = document.getElementById('center_container');
		var childObj = document.getElementById('child_container');
		childObj.innerHTML = childObj.innerHTML + centerObj.innerHTML;
		
		// Unserialized
		if (true) {
			var string = childObj.innerHTML;
			var filter = /&gt;/g;
			string = string.replace(filter, '>');
			filter = /&lt;/g;
			string = string.replace(filter, '<');
			childObj.innerHTML = string;
		}

		cmxCore_countBlock++; centerObj.innerHTML = '';
	}
	blockEffect();
}

function blockEffect() {
// <![CDATA[
  Sortable.create('left_container',{containment:['left_container','center_container','right_container', 'child_container'], dropOnEmpty:true, handle:'handler', constraint:false, tag:'div'});
  Sortable.create('center_container',{containment:['left_container','center_container','right_container', 'child_container'], dropOnEmpty:true, handle:'handler', constraint:false, tag:'div', onUpdate:hideContent});
  Sortable.create('right_container',{containment:['left_container','center_container','right_container', 'child_container'], dropOnEmpty:true, handle:'handler', constraint:false, tag:'div'});
  Sortable.create('child_container',{containment:['left_container','center_container','right_container', 'child_container'], dropOnEmpty:true, handle:'handler', constraint:false, tag:'div', onUpdate:hideContent});
// ]]>
}

function closeWindow(object_id) {
	var filter = /<[A-Za-z0-9\/]+>/g;
	var blockName = document.getElementById(object_id+'_handler').innerHTML.replace(filter,'');
	blockName = blockName.replace('&nbsp;', '');
	if(confirm('Remove ' + blockName + '?')==false )
		return true;
	else {
		document.getElementById(object_id).innerHTML="";
		var parentObj = document.getElementById(object_id).offsetParent;
		parentObj.innerHTML = parentObj.innerHTML.replace('<div style="position: relative;" id="'+ object_id +'"></div>', '');
		blockEffect();
	}
}

function hideContent() {
	var section_id = Draggables.activeDraggable.element.getAttribute('id') + '_section';
	if (document.getElementById(section_id).getAttribute('style') == null || 
			document.getElementById(section_id).getAttribute('style') == 'visibility: visible;') {
		cmxCore_section[section_id] = document.getElementById(section_id).innerHTML;
		document.getElementById(section_id).innerHTML = "";
		document.getElementById(section_id).setAttribute('style', 'visibility: hidden;');
	} else {
		document.getElementById(section_id).innerHTML = cmxCore_section[section_id];
		document.getElementById(section_id).setAttribute('style', 'visibility: visible;');
	}
}

