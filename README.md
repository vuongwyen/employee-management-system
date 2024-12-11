# **Employee Management System**  

## **Overview**  
The **Employee Management System** is a web application designed to streamline employee and department management processes within an organization. Key features include:  
- Employee management: Add, update, delete, and search employee records.  
- Department management: Create and manage departments.  
- Role-based access control: Separate functionalities for Admin and Employee roles.  

## **Features**  
### **1. Employee Management**  
- Add, edit, delete, and search employees by name or ID.  
- Maintain detailed employee records including personal and job-related information.  

### **2. Department Management**  
- Manage departments with the ability to assign employees to specific departments.  
- View department-specific employee lists.  

### **3. Role-Based Access Control**  
- Admin: Full access to manage employees, departments, and system settings.  
- Employee: Limited access to view personal information and certain public data.  

---

## **Technologies Used**  
- **Front-End:** HTML5, CSS3 (Bootstrap), jQuery , ChartJS 
- **Back-End:** PHP  
- **Database:** MySQL  
- **Version Control:** Git and GitHub  

---

## **System Design**  
### **1. Architecture**  
The system follows a **Client-Server Architecture**, ensuring separation of concerns:  
- **Client:** User interface developed using HTML, CSS, and jQuery.  
- **Server:** PHP for handling application logic.  
- **Database:** MySQL for storing and managing data.  

### **2. Database Design**  
- Key tables include:  
  - `employees`: Stores employee details (ID, name, position, department, etc.).  
  - `departments`: Manages department data (ID, name, manager, etc.).  
  - `users`: Handles authentication and user roles.  

---

## **Installation**  
Follow these steps to set up the project locally:  
1. Clone the repository:  
   ```bash  
   git clone https://github.com/vuongwyen/employee-management-system.git  
   ```  
2. Navigate to the project directory:  
   ```bash  
   cd employee-management-system  
   ```  
3. Set up the database:  
   - Import the `employeemanagementsystem.sql` file (if provided) into your MySQL server.  
   - Update database connection details in the `config.php` file.  

4. Start a local server:  
   - Use tools like **XAMPP** or **WAMP**.  

5. Open the application in your browser:  
   ```  
   http://localhost/employee-management-system  
   ```  

---

## **Screenshots**  
*Login Interface*

![image](https://github.com/user-attachments/assets/6f90a627-d5f7-4e5a-a347-40f05ddd62cd)
![image](https://github.com/user-attachments/assets/0a393954-e9d7-4a0a-a812-9a6e8876e562)

*Amin Dashboard Interface*

![image](https://github.com/user-attachments/assets/6bcee675-5052-4b8c-a994-73be2a325a51)

*Employee Management Interface*  

![image](https://github.com/user-attachments/assets/052d3ca0-b7e0-46a8-988e-34858f6e6f5d)

*Create new and Update Employee Interface*

![image](https://github.com/user-attachments/assets/154eda81-898e-4dd4-8ad8-77349451ef4c)

*Employee Dashboard Interface*  

![image](https://github.com/user-attachments/assets/60f9181c-63fb-4d9f-91ec-1f27e32e8b9a)

*Employee Payroll*

![image](https://github.com/user-attachments/assets/b06399d8-0d9c-4ada-b096-0c205f740444)


---

## **Contributing**  
We welcome contributions to improve the project! To contribute:  
1. Fork the repository.  
2. Create a new branch:  
   ```bash  
   git checkout -b feature-name  
   ```  
3. Commit your changes:  
   ```bash  
   git commit -m "Add your message here"  
   ```  
4. Push to the branch:  
   ```bash  
   git push origin feature-name  
   ```  
5. Open a pull request.  

---

## **License**  
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.  

---

## **Contributors**
We appreciate the efforts of everyone involved in this project:

- **Trương Vương Quyền (Team Leader)** – System design, database development, and overall project management.
- **Tòng Thị Na** – Front-end design and user interface implementation.
- **Vũ Huy Hoàng** – General support in back-end and front-end development.

---

## **Contact**  
If you have any questions or feedback, feel free to reach out:  
- **Trương Vương Quyền**: treepoo2023@gmail.com
- **GitHub Repository:** [Employee Management System](https://github.com/vuongwyen/employee-management-system)  

