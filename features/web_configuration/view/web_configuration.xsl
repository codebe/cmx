<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="data.xml" -->
<!DOCTYPE xsl:stylesheet  [
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
<xsl:output method="html" encoding="iso-8859-1" />
<xsl:template match="/"><div>
	<xsl:attribute name="id"> <xsl:value-of select="//blockID" /></xsl:attribute>
	<form action="#" enctype="multipart/form-data" target="_blank">
	<table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
	  <tr>
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>Web Properties <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
	  </tr>
	  <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
	  	<td colspan="2"><table width="100%" cellspacing="5" cellpadding="0">
              <tr>
                <td>Web Name</td>
                <td>:</td>
                <td><input id="web_name" name="web_name" type="text" size="25">
				<xsl:attribute name="value"><xsl:value-of select="//web_name" /></xsl:attribute>
				</input></td>
              </tr>
			  <tr>
                <td>Web Title</td>
                <td>:</td>
                <td><input id="web_title" name="web_title" type="text" size="25">
				<xsl:attribute name="value"><xsl:value-of select="//web_title" /></xsl:attribute>
				</input></td>
              </tr>
			  <tr>
                <td>Web Author</td>
                <td>:</td>
                <td><input id="web_author" name="web_author" type="text" size="25">
				<xsl:attribute name="value"><xsl:value-of select="//web_author" /></xsl:attribute>
				</input></td>
              </tr>
			  <tr>
                <td>Web Url</td>
                <td>:</td>
                <td><input id="web_url" name="web_url" type="text" size="25">
				<xsl:attribute name="value"><xsl:value-of select="//web_url" /></xsl:attribute>
				</input></td>
              </tr>
			  <tr>
                <td valign="top">Web Description</td>
                <td valign="top">:</td>
                <td><textarea id="web_description" name="web_description" cols="25" rows="7"><xsl:value-of select="//web_description" /></textarea></td>
              </tr>
			  <tr>
			  	<td valign="top">Web Keywords</td>
				<td valign="top">:</td>
				<td><textarea id="web_keywords" name="web_keywords" cols="25" rows="7"><xsl:value-of select="//web_keywords" /></textarea></td>
			  </tr>
			  <tr>
			  	<td valign="top">Web Default Theme</td>
				<td valign="top">:</td>
				<td><select id="web_default_theme" name="web_default_theme">
                  <option value="">&lt; Select Active Theme &gt;</option>
				  <xsl:for-each select="//Profile">
				  	<option><xsl:attribute name="value"><xsl:value-of select="directory" /></xsl:attribute><xsl:value-of select="name" /></option>
				  </xsl:for-each>
				</select></td>
			  </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input name="submit" type="button" id="submit" value="Submit">
				<xsl:attribute name="onClick">updateWebProfile(<xsl:value-of select="//blockID" />)</xsl:attribute>
				</input></td>
              </tr>              
            </table></td>
	  </tr>
	  <tr></tr>
	</table></form></div>
</xsl:template>
</xsl:stylesheet>