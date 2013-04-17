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
<xsl:variable name="linenumber" select="1" />
<xsl:template match="/">
    <div>
	<xsl:attribute name="id"> <xsl:value-of select="//blockID" /></xsl:attribute><form action="#">
      <table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
        <tr>			
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>User Management Page <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
        </tr>
        <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
          <td colspan="2">
		  	<table width="100%" cellspacing="5" cellpadding="0">			
				<tr>
					<td>No</td>
					<td>Username</td>
					<td>User Mode</td>
					<td>Status</td>
					<td>Management</td>
				</tr>
		  		<xsl:for-each select="//Users">
				<tr>
					<td><xsl:number count="Users" format="01" value="position()"/></td>
					<td><xsl:value-of select="name" /></td>
					<td><xsl:value-of select="umode" /></td>
					<td><xsl:value-of select="status" /></td>
					<td>
						<xsl:if test="//umode='SuperUser'">
						<a href='#'><xsl:attribute name="onClick">showEditProfile(<xsl:value-of select="//blockID" />, <xsl:value-of select="uid" />, <xsl:value-of select="//userID" />)</xsl:attribute>edit</a>, 
						<a href="#"><xsl:attribute name="onClick">deleteUser(<xsl:value-of select="//blockID" />, <xsl:value-of select="uid" />, <xsl:value-of select="//userID" />)</xsl:attribute> delete</a>, 
						</xsl:if>
						   
					   <xsl:choose>
						   <xsl:when test="status='A'">
							<a href="#"><xsl:attribute name="onClick">deactivatingUser(<xsl:value-of select="//blockID" />, <xsl:value-of select="uid" />, <xsl:value-of select="//userID" />)</xsl:attribute>deactivating</a>
						   </xsl:when> 
						   <xsl:otherwise>
							<a href="#"><xsl:attribute name="onClick">activatingUser(<xsl:value-of select="//blockID" />, <xsl:value-of select="uid" />, <xsl:value-of select="//userID" />)</xsl:attribute>activating</a>
						   </xsl:otherwise>
					   </xsl:choose>
					</td>
				</tr>					
				</xsl:for-each>
				<tr>
					<td colspan="5"><hr size="1" width="100%" /></td>
				</tr>
				<tr>
					<td colspan="5"><a href='#'>
					  <xsl:attribute name="onClick">showEditProfile(<xsl:value-of select="//blockID" />, <xsl:value-of select="//userID" />, <xsl:value-of select="//userID" />)</xsl:attribute>
					   edit profile</a>, Edit the detail profile of your account</td>
				</tr>
				<xsl:if test="//umode='SuperUser'">
				<tr>
					<td colspan="5">
					<a href='#'>
						  <xsl:attribute name="onClick">showAddUser(<xsl:value-of select="//blockID" />, <xsl:value-of select="//userID" />)</xsl:attribute>
						   create account</a>, Add new user account
					</td>
				</tr>
				</xsl:if>
				<tr>
					<td colspan="5">
					<a href='#'>
						  <xsl:attribute name="onClick">logout(<xsl:value-of select="//blockID" />, <xsl:value-of select="//userID" />)</xsl:attribute>
						   logout </a>, Logout from the current user
					</td>
				</tr>
			</table>
		  </td>
        </tr>
        <tr></tr>
      </table></form>
    </div>
  </xsl:template>
</xsl:stylesheet>