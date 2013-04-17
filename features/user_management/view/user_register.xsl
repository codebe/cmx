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
<xsl:template match="/">
    <div>
	<xsl:attribute name="id"> <xsl:value-of select="//blockID" /></xsl:attribute>
	<form action="#">
      <table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
        <tr>
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>Register Page <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
        </tr>
        <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
          <td colspan="2"><table width="100%" cellspacing="5" cellpadding="0">
		      <tr>
                <td width="80">Full Name</td>
                <td width="5">:</td>
                <td><input name="name" type="text" id="name" size="25" />&nbsp;<span style="color:#FF0000">*</span></td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td width="80"><input name="uname" type="text" id="uname" size="25" />&nbsp;<span style="color:#FF0000">*</span></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>:</td>
                <td><input name="pass" type="password" id="pass" size="20" />&nbsp;<span style="color:#FF0000">*</span></td>
              </tr>
			  <tr>
                <td>Retype Password</td>
                <td>:</td>
                <td><input name="retypepass" type="password" id="retypepass" size="20" />&nbsp;<span style="color:#FF0000">*</span></td>
              </tr>
			  <tr>
                <td>Email</td>
                <td>:</td>
                <td><input name="email" text="text" id="email" size="25" />&nbsp;<span style="color:#FF0000">*</span></td>
              </tr>
			  <tr>
                <td>Forward Email</td>
                <td>:</td>
                <td><input name="femail" text="text" id="femail" size="25" /></td>
              </tr>
			  <tr>
                <td>URL</td>
                <td>:</td>
                <td><input name="url" text="text" id="url" size="25" /></td>
              </tr>
			  <tr>
                <td>Yahoo ID</td>
                <td>:</td>
                <td><input name="yim" text="text" id="yim" size="25" /></td>
              </tr>
			  <tr>
                <td>ICQ</td>
                <td>:</td>
                <td><input name="icq" text="text" id="icq" size="25" /></td>
              </tr>
			  <tr>
                <td valign="top">Signature</td>
                <td valign="top">:</td>
                <td><textarea name="sign" id="sig" cols="24" rows="5"></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input name="reset" type="reset" value="Reset" /> &nbsp; 
				<input name="submit" type="button" id="submit" value="Submit">
				<xsl:attribute name="onClick">registerUser(<xsl:value-of select="//blockID" />)</xsl:attribute>
				</input></td>
              </tr>
			  <tr><td colspan="3">Back to login page ?<a href='#'>
			  <xsl:attribute name="onClick">showLoginPage(<xsl:value-of select="//blockID" />)</xsl:attribute>
			   to login page </a>  </td>
              </tr>
            </table></td>
        </tr>
        <tr></tr>
      </table></form>
    </div>
  </xsl:template>
</xsl:stylesheet>
