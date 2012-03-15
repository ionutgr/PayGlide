                <div id="pagetitle" class="clearfix">
                    <h1 class="left">Dashboard</h1>
                    
                </div>
            </div>
        </header>
        <div class="container_16 clearfix" id="actualbody">
        <div class="grid_16 widget first">
          <div class="widget_title clearfix">
            <h2>Your Facebook Details</h2>
          </div>
          <div class="widget_body"><br />
            <table align="center">
              <tr >
                <td width="15">&nbsp;</td>
                <td width="250"><label for="fullname2">Full Name</label></td>
                <td>{first_name} {middle_name} {last_name}</td>
              </tr>
              <tr >
                <td>&nbsp;</td>
                <td><label for="Email2">Email</label></td>
                <td>{email}</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label for="Username2">Username</label></td>
                <td>{username}</td>
              </tr>
              <tr >
                <td>&nbsp;</td>
                <td><label for="Birthday2">Birthday</label></td>
                <td>{birthday}</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label for="Website2">Website</label></td>
                <td>{website}</td>
              </tr>
            </table>
            <br />
          </div>
        </div>
   <form action="" method="post" id="profile" name="profile">
        <div class="grid_16 widget first">
   
    <div class="widget_title clearfix">
        <h2>Please Fill Additional PayGlide Information</h2>
    </div>
    <div class="widget_body"><br />
      <table align="center">
          <tr>
            <td>&nbsp;</td>
            <td>Business Name</td>
            <td><input class="medium :required" type="text" name="business_name" id="business_name" value="{business_name}"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr >
            <td width="15">&nbsp;</td>
                <td width="250">PayPal Email</td>
                <td><label for="paypal_email"></label>
                <input class="medium :required" type="text" name="paypal_email" id="paypal_email" value="{paypal_email}" /><span class="infobar">PayPal Email is Required</span></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
                <td align="left" valign="top">Address</td>
                <td><label for="address"></label>
                <textarea class="medium :required" name="address" id="address" cols="40" rows="5">{address}</textarea><span class="infobar">Address is Required</span>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr class="odd">
              <td>&nbsp;</td>
              <td>City</td>
              <td><input class="medium :required" type="text" name="city" id="city" value="{city}"/><span class="infobar">City is Required</span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>State</td>
              <td><select class="medium :required" name="state" id="state">
                                     <option value="0">Please select country first</option>

              </select><span class="infobar">State is Required</span></td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td>&nbsp;</td>
              <td>Zip</td>
              <td><input class="medium :required" type="text" name="zip" id="zip"  value="{zip}"/><span class="infobar">Zip is Required</span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
                <td>Country</td>
                <td>
                 
                  <select class="medium :required" name="country" id="country">
                       {countries}
                       <option value="{country_code_char3}">{country_name}</option>
                       {/countries}
                  </select><span class="infobar">Country is Required</span>
</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Phone</td>
              <td><input class="medium :required" type="text" name="phone" id="phone" value="{phone}"/><span class="infobar">Phone is Required</span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Social Security Number</td>
              <td><input class="medium " type="text" name="ssn" id="ssn" value="{ssn}"/><span class="infobar">SSN is Required for USA residents</span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="4" > <center><a id="save" class="btn blue" href="javascript: ;">
<span>Save</span>
</a> </center></td>
            </tr>

        </table>
      <br />
    </div>
</div>
</form>
<div class="clear"></div>

