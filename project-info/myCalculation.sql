CREATE DATABASE myCalculation;

CREATE TABLE loanCalculation (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    TotalLoanAmount varchar(50),
    BananceLoanAmount varchar(50),
    MonthlyAmount varchar(20),
    PaymentDate varchar(20),
    PendingMonths varchar(20),
    BankName varchar(50),
    IntrestRate varchar(20)
);

ALTER TABLE `loanCalculation` ADD COLUMN `MonthlyAmount` VARCHAR(20) NULL DEFAULT NULL AFTER `BananceLoanAmount`;
ALTER TABLE `loanCalculation` ADD COLUMN `PaymentDate` VARCHAR(20) NULL DEFAULT NULL AFTER `MonthlyAmount`;

eox ventage

1. MonthlyAmount
2. BankName
3. PaymentDate
4. TotalLoanAmount

5. BananceLoanAmount
6. PendingMonths
7. IntrestRate

-- Account No / Loan Number
-- EMI Bank

LoginId: GIRI@CITI1
Password: xpq142gy

-- Ok
INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('4,66,000','1,94,331','10,851','1','13','CITI Bank', '13.50');

-- Ok
INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('3,51,000','3,51,000','4,400','2','15','Bajaj OD', '14'); -- 14% Intrest Not Sure

-- Ok
INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('1,94,000','72,565','5,500','5','15','CITI Bank Cc', '14');

-- Ok
INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('2,00,000','1,34,888','10,376','5','13','PayTM', '22');

-- 
INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('35,00,000','85,000','23,642','5','15','HDFC Bank', '17');

INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('4,00,000','85,000','3,551','5','15','HDFC Bank', '17');

INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('1,50,000','85,000','1,765','5','15','HDFC Bank', '17');

-- Ok
INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('1,13,000','1,38,639','3,747','5','37','RBL Cc', '25');

-- Ok
INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('2,30,000','2,13,700','8,548','5','25','MoneyView', '17'); -- 17 (Not Sure)

INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('60,000','85,000','3,747','20','15','Ujjivan Bank', '17');

INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('3,00,000','85,000','9,000','10','15','Money Borrowed', '17');

INSERT INTO loanCalculation (TotalLoanAmount,BananceLoanAmount,MonthlyAmount,PaymentDate,PendingMonths,BankName,IntrestRate) 
VALUES ('15,000','85,000','15,000','30','15','SBI Cc', '17');

==================================================================

select * from loanCalculation;
select * from loanCalculation order by TotalLoanAmount desc;
select * from loanCalculation order by TotalLoanAmount asc;

select * from loanCalculation order by PendingMonths desc;
select * from loanCalculation order by PendingMonths asc;

select * from loanCalculation order by IntrestRate desc;
select * from loanCalculation order by IntrestRate asc;


