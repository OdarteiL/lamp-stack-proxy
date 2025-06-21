# LAMP Stack Application (Scalable Deployment on AWS)

## Overview

This is a PHP-based CRUD application deployed on AWS using the LEMP stack (Linux, Nginx, MySQL, PHP). The application is horizontally scalable using an Auto Scaling Group and is served through an Application Load Balancer. The database is hosted on Amazon RDS using a MySQL Community instance (`lampdb2`).

## Architecture

- **Web Server**: EC2 (Auto Scaling Group)
- **Load Balancer**: Application Load Balancer (ALB)
- **Database**: Amazon RDS (MySQL)
- **Provisioning**: AWS CloudFormation

## Folder Structure

```
lamp-app/
├── src/                    # PHP source code (index.php, db.php, etc.)
├── scripts/                # Installation scripts (optional)
├── monitoring/             # CloudWatch dashboard configs (optional)
├── cloudformation/         # CloudFormation template for deployment
└── reverse-proxy/          # Nginx reverse proxy config (optional)
```

## Deployment Steps

1. **Create an EC2 AMI** from your working LEMP instance.
2. **Upload and deploy** the CloudFormation template to:
   - Set up the ALB
   - Launch Auto Scaling Group using the AMI
3. **Update `db.php`** with the RDS MySQL endpoint (`lampdb2`) and credentials.
4. **Edit RDS security group** to allow port 3306 access from the EC2 security group.
5. **Verify connectivity** by accessing your Load Balancer DNS (provided in CloudFormation outputs).

## Database Configuration

- **Engine**: MySQL Community Edition
- **Endpoint**: `lampdb2.<your-actual-endpoint>.rds.amazonaws.com`
- **Port**: 3306
- **User**: `lampadmin`
- **Database**: `lampdb`

## Security

- Only HTTP (port 80) exposed via ALB
- MySQL port only accessible from ASG instances
- No database access exposed publicly

## Monitoring (Optional)

- You can attach CloudWatch agent to EC2 instances to monitor:
  - CPU, Memory, Disk
  - Nginx logs
  - PHP errors

## License

MIT
