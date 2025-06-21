# Scalable LAMP Stack Application (AWS Deployment)

This project is a LAMP-based (Linux, Nginx, MySQL, PHP) web application deployed on AWS with production-grade scalability and availability.

## Technologies Used

- **AWS EC2** – for hosting PHP/Nginx web app
- **Amazon RDS (MySQL)** – managed relational database
- **Application Load Balancer (ALB)** – distributes traffic across instances
- **Auto Scaling Group (ASG)** – dynamically scales EC2s
- **CloudFormation** – infrastructure as code
- **Ubuntu + Nginx + PHP** – backend environment
- **GitHub** – version control and collaboration

## Project Structure

lamp-app/
├── src/ # PHP source files (index.php, db.php, etc.)
├── cloudformation/ # AWS CloudFormation template
├── reverse-proxy/ # nginx.conf (optional if using ALB directly)
├── monitoring/ # CloudWatch configs (optional)
└── README.md # Project overview

pgsql
Copy
Edit

## Deployment Summary

1. **AMI created** from a working Nginx+PHP app server
2. **Auto Scaling Group** launched via CloudFormation
3. **Load Balancer** attached to distribute traffic
4. **MySQL Database** hosted on Amazon RDS (instance: `lampdb2`)
5. **`db.php`** updated with private RDS endpoint and credentials
6. **Security Groups** configured to allow traffic from ASG EC2s to RDS

## Security Practices

- RDS access limited to EC2 security group (not public)
- No hard-coded secrets (in production, use AWS SSM or `.env`)
- HTTP only (can be extended with ACM & HTTPS)

## Testing

- Access app via Load Balancer DNS
- Test database connectivity via `db.php`
- Scale instances manually or via CPU threshold

## License

MIT License
