DarwinBox test assignment.

A web api built over Codeigniter to fascilitate pushing attendance to server.


usage:

POSTing attendance: 

http://localhost:8080/DarwinBoxTest2/index.php/api/employee/attendance/
verb POST
Headers: 
    X-API-KEY: 574691CC44C92C0408202E9A1D463072
Body:
    emp_id: 1
    org_id: 2
    timestamp: 2017/04/04
    status: 2


GETing list of attendance:
http://localhost:8080/DarwinBoxTest2/index.php/api/employee/attendance/
verb GET
Headers: 
    X-API-KEY: 574691CC44C92C0408202E9A1D463072