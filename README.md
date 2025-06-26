# Placement Management System (Dusk)

## Overview
Dusk is a placement management system designed to streamline the campus recruitment process. The platform connects students, companies, placement officers, HODs, and administrative staff through a centralized system.

## Features

### For Students
- User-friendly registration and login system
- Profile management and resume uploads
- Job application tracking
- Centralized portal to see all listed jobs

### For Companies
- Company profile management
- Post job opportunities
- Review student applications
- Schedule recruitment drives

### For Placement Officers
- Overall system management
- Student data management
- Company relationship management
- Notification broadcasting

### For HODs and Administrative Staff
- Department-specific analytics
- Student approval system
- Report generation

## Technology Stack
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Installation and Local Setup

1. **Prerequisites**:
   - XAMPP/WAMP/LAMP stack
   - PHP 7.0+
   - MySQL

2. **Setup Steps**:
   - Clone this repository to your web server's document root (htdocs folder for XAMPP)
   - Create a database named `placement` in MySQL
   - Import the database schema from the `Database` directory
   - Access the application through `http://localhost/tnp-dusk/`

3. **User Access**:
   - **Student**: `SProfile/index.php`
   - **Company**: `CompanyProfile/index.php`
   - **Placement Officer**: `PProfile/index.php`
   - **HOD**: `HODProfile/index.php`
   - **Administrative**: `PriProfile/index.php`


## Directory Structure

- `CompanyProfile`: Company interface for job postings and recruitment
- `SProfile`: Student profile and application management
- `PProfile`: Placement officer administrative tools
- `HODProfile`: Department head interface
- `PriProfile`: Principal/administrative access
- `Drives`: Information about recruitment drives
- `Homepage`: Landing pages and main navigation
- `Database`: Database configuration and SQL files
- `Gallery`: Image gallery for events
