# Incident-Response-System

Final Project for Database Management Systems course at Adelphi University. The task is to create a PHP frontend website 
to interact with a database to add, edit, and retreive incident reports. 

## Case Study

Computer Security Incident Response Teams (CSIRTs) track incidents as they occur. 
When an incident is declared, it is assigned a unique identifier and it is recorded in a database. 
For each incident, the incident number, a type of incident (chosen from a dynamically changing list), 
the date it was created, an incident state ('open', 'closed', 'stalled'), and a list of free-form comments is maintained. 
Associated with each comment is the name of the handler who wrote it.

In addition, associated with each incident could be any number of people (last name, first name, job title, email address), 
and any number of IP addresses. With each IP address or each person, the handler can record a reason for the address association.

Incident responders must be able to query the database by incident number and receive a report containing the full history of a given incident. 
Free form comments must be sorted from most recent on top, to oldest on the bottom. 
In addition, incident responders must be able to record new incidents, change the state of incidents, 
add comments, and/or add and remove people and IP addresses.

To facilitate information sharing, the incident tracking system must be able to export each incident in a 
standard incident exchange format and send it via email. 
Likewise, other teams may send incident-related information via email to the CSIRT operating this application. 
When that happens, each report received will trigger a new incident being recorded.

All updates to an incident must be recorded as free-form comments to the incident. 
All use of the system is subject to authentication via an external single sign-on system.
