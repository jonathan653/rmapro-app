<h1>COMP373 Project</h1>
<h2>University of Otago</h2>
<h3>Title Recall: A web-based business tool</h3>
<h4>The goal of this project is to create a system to provide reminders to the client for resource consent applications.</h4>
Client: Conrad Anderson of Anderson & Co, Dunedin.

By Esther Ardley, Jonathan Chua, Monique Arron, and Sam Heenan.
<br><br>

<h1>Handover Information</h1> 
<h2>How to Automate the Email Report Using Cron</h2>  

1. In Terminal, ensure that you are in the project directory. On LightSail, this is /htdocs/rmapro-app.

2. Type in `crontab -e` and press enter.

3. Add the following to the end of the file:

    `PATH=/usr/bin:/bin:/opt/bitnami/php/bin:`

    `0 19 * * SUN php -f /home/bitnami/htdocs/rmapro-app/emailreport.php > /home/bitnami/Out.put`

    This will run emailreport.php every Sunday night at 19:00 UTC. Depending on daylight savings, this means that the report email will arrive at 07:00 NZST or 08:00 NZDT each Monday.

4. Ensure that emailreport.php is executable by entering the following:

    `sudo chmod u+x emailreport.php`

5. That should be it! If you are having any issues, you can change "0 19 * * SUN" to "* * * * *" which will try to run emailreport.php every minute. This is very handy for troubleshooting purposes but make sure to stop it as soon as you have sorted out the problem because the AWS email API might think that you are trying to spam.

<h2>Gmail Forwarding</h2>

Because AWS have denied us access to email anyone but our own address, the solution to this is to set up a forwarding rule in Gmail. 

* To set this up, we need Conrad to give us the verification code. This can happen while on the Zoom with him this week.

* Once it is set up, we can set up a forwarding rule so that emails from comp373project@gmail.com to that same address with the subject line "Title Recall Weekly Report" are forwarded to his email address.

<h2>Transfer the AWS Account to Conrad</h2>

There has been a job ticket submitted for this. Hopefully they come through with the goods.

<h2>Pull Repo & Drop Tables</h2>

In preparation for the handover, we will need to pull the most recent version of the repo, drop all the tables and then re-create them so he has a clean instance to work with.

<h3>Handy Things to Know</h3>

* Site address is http://3.105.98.133/rmapro-app/
    * Access to the terminal is through the web interface when signed in to AWS.
* Password to Bitnami / PhpMyAdmin is **LeCFi3Jaavgt**
    *  To access the remote instance of PhpMyAdmin, follow the instructions at https://docs.bitnami.com/aws/infrastructure/lamp/get-started/access-phpmyadmin/
* AWS SMTP Username: **AKIAXB3L3RVTCXOBPO5E**
* AWS SMTP Password: **BFH7dMJyyM5qBB3XZJJT6YEi4PyR7SHURCknaHVRNPZV**