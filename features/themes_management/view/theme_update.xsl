<?xml version="1.0" encoding="iso-8859-1"?>
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
	<form action="#" enctype="multipart/form-data" target="_blank" method="post">
	<table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
	  <tr>
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>Themes Management <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
	  </tr>
	  <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
	  	<td colspan="2"><table width="100%" cellspacing="5" cellpadding="0">
              <tr>
                <td>Upload New Theme</td>
                <td>:</td>
                <td><input name="new_theme_path" type="file" id="new_theme_path" size="24" /></td>
              </tr>
			  <tr>
                <td>New Theme Name</td>
                <td>:</td>
                <td><input name="new_theme_name" type="text" id="new_theme_name" size="24" />&nbsp;<span style="color:#FF0000">*</span></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input name="submit" type="button" id="submit" value="Submit">
				<xsl:attribute name="onClick">installTheme(<xsl:value-of select="//blockID" />)</xsl:attribute></input></td>
              </tr>  
			  <tr>
                <td colspan="3"><hr size="1" width="100%" /></td>
              </tr>
              <tr>
                <td>Delete Installed Theme</td>
                <td>:</td>
                <td><select name="delete_theme_name" id="delete_theme_name">
				   <option value="">&lt; Installed Theme &gt;</option>
					<xsl:for-each select="//Themes">
				  <option><xsl:attribute name="value"><xsl:value-of select="directory" /></xsl:attribute><xsl:value-of select="name" /></option>
				  </xsl:for-each>
                </select>&nbsp;<input name="delete" type="button" value="Delete">
				<xsl:attribute name="onClick">deleteTheme(<xsl:value-of select="//blockID" />)</xsl:attribute>
				</input></td>
              </tr>            
            </table></td>
	  </tr>
	  <tr></tr>
	</table></form></div>
</xsl:template>
</xsl:stylesheet>