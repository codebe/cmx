<?xml version="1.0" encoding="iso-8859-1"?><!DOCTYPE xsl:stylesheet  [
	<!ENTITY nbsp   "&#160;">
	<!ENTITY copy   "&#169;">
	<!ENTITY reg    "&#174;">
	<!ENTITY trade  "&#8482;">
	<!ENTITY mdash  "&#8212;">
	<!ENTITY ldquo  "&#8220;">
	<!ENTITY rdquo  "&#8221;"> 
	<!ENTITY pound  "&#163;">
	<!ENTITY yen    "&#165;">
	<!ENTITY euro   "&#8364;">
]>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" encoding="iso-8859-1" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>
<xsl:template match="/">
	<div id="masthead">
	  <h1 id="pageName">CMX Theme Sample</h1>
	  <i>The Future of Web</i>
	</div>
	<div id="mainBody">
		  <div id="leftPan" align="left">
			<h1>Menu</h1>
				<!-- List Menu Templates -->
				<div id="link_menu">
				<ul>
					<xsl:for-each select="//Module">
						<li><a href="#">
						<xsl:attribute name="onClick"><xsl:value-of select="directory" />()</xsl:attribute>
						<xsl:value-of select="displayname" />
						</a></li>
					</xsl:for-each>
				</ul>
				</div>
				<!-- End List Menu Templates -->
			  <div id="left_container">
				<hr width="100%" align="center" size="1" color="#CCCCCC" /><center style="font-size:12px; color:#FFFFFF; font-weight:bold; background-color:#000000;">Drag Here</center><hr width="100%" align="center" size="1" color="#CCCCCC" />
			  </div>	
		  </div>
		  
		  <div id="centerPan">
			<div id="child_container"></div>
			<div id="center_container"></div>
		  </div>
		  
		  <div id="rightPan" align="left">
			  <div id="right_menu" align="center">
				  <div style="margin:10px;"><input type="button" value="Create Block!" onclick="createBlock();" style="cursor:pointer;" /><br /><br /></div>
			  </div>
			  <div id="right_container">
				<hr width="100%" align="center" size="1" color="#CCCCCC"  style=""/><center style="font-size:12px; color:#FFFFFF; font-weight:bold; background-color:#000000">Drag Here</center><hr width="100%" align="center" size="1" color="#CCCCCC" />
			  </div>
		  </div>
		  <br class="blank" />
	</div>
	<!--end content -->
	<div id="siteInfo"> <img src="" width="44" height="22" /> <a href="#">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact Us</a> | &copy;2003 Company Name </div>
	<br />
</xsl:template>

</xsl:stylesheet>



