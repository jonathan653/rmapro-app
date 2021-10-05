<h1>COMP373 Project</h1>
<h2>University of Otago</h2>
<h3>Title Recall: A web-based business tool</h3>
<h4>The goal of this project is to create a system to provide reminders to the client for resource consent applications.</h4>
For client - Conrad Anderson of Anderson & Co, Dunedin

By Esther, Jonathan, Monique, and Sam.
<br><br>

<!-- <h2> To Access The PHPMyAdmin Backend:</h2>
These instructions will work for our current version. If you want to implement your own version, follows the additional steps further down.
<li> Download the AWS Lightsail SSH key (LightsailDefaultKey-ap-southeast-2.pem) from the repo to somewhere on your local computer (as you may not be able to access it if you are not running the XAMPP VM).</li>
<ul>
<li>Make a note of where you save it as you will need this path later.</li></ul>
<li>In terminal (macOS & Linux) or PuTTY (Windows) connect to our Lightsail instance with a secure tunnel by using the following command:
ssh -N -L 8888:127.0.0.1:80 -i /Users/sama/Downloads/LightsailDefaultKey-ap-southeast-2.pem bitnami@54.252.79.56</li>
<ul>
<li> Replace the filepath above with wherever you have saved the SSH key on your local computer but keep the rest exactly the same. This will create a secure tunnel between your computer and the Lightsail instance on the AWS cloud.</li></ul>
<li> Now, from your browser, go to http://127.0.0.1:8888/phpmyadmin and, all going to plan, you should be greeted with a welcome screen for PHPMyAdmin.
<ul>
<li> Note that in many cases 127.0.0.1 and localhost mean the same thing but, in this case, the system is very particular and will only allow 127.0.0.1</li>
<li> The username is <b>root</b> and the password is <b>iutnWn1VQ8pU</b>.</li></ul>
<li> Once in, you will find the layout very familiar and can manipulate the database as you please.  
</ul>  
<br> -->

<!-- <b>Notes:</b> 
To link to the database on the AWS side, db.php needs to be modified as follows (minus the first and last speech marks):
> "<?php
> $con = MySQLi_connect(
> "127.0.0.1",
> "root",
> "iutnWn1VQ8pU",
> "AnC_Sep22"
> );
> if (MySQLi_connect_errno()) {
> echo "Failed to connect to MySQL: " . MySQLi_connect_error();
> }"   -->

<!-- Likewise, server.php needs to modify the account credentials line as follows:  
> // connect to the database
> $db = mysqli_connect("localhost", "root", "", "AnC_Sep22");  

If we could reconcile our local machines to use these same credentials then I see no reason why these changes couldn't be integrated into the repo and then be pulled through with each update to the cloud instance. -->

<!-- <h2>Security:</h2>  
<li>Now that this is on the web, anyone with the address can see or access our website. This is great for convenience but perhaps not the best from a security standpoint. We can lock it down more once we have all successfully been able to log in to the back end. </li>
<li>Because the AWS instance is linked to my credit card (even at the free tier), if it is okay with the team, I would prefer to keep this under my control. However, I have no intention of keeping the process of creating one of these instances a secret as we will need to do this for final deployment! So...</li>  <br> -->

<!-- <h2>To Create A Lightsail Instance </h2>
<li>Follow these instructions (https://lightsail.aws.amazon.com/ls/docs/en_us/articles/how-to-create-amazon-lightsail-instance-virtual-private-server-vps) to create your Lightsail instance</li>
<ul>
<li>I just went with the defaults offered. It will ask you for a credit card even on the free tier.</li></ul>
<li>Due to security restrictions, you are no longer able to use a username and password so to link your GitHub repo with AWS you will need to create a token using this guide (https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token)</li>
<li>Clone the repository to the Lightsail instance from the terminal using git clone https://github.com/YOURREPONAME/rmapro-app.git (replacing your repo name as appropriate).</li>
<ul>
<li>I just used the token as both my username and password in this section and it worked for me.</li>
<li>You may need to update db.php and server.php with your credentials as per the PHPMyAdmin section.</li>
<li>That should be it!</li><br> -->

