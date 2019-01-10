-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 01:25 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_master`
--

CREATE TABLE `account_master` (
  `AccountId` int(11) NOT NULL,
  `AccountName` varchar(40) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `CostCenter` int(11) NOT NULL,
  `BillWiseDetail` int(11) NOT NULL,
  `CreditDays` int(11) NOT NULL,
  `CreditLimit` int(11) NOT NULL,
  `PriceListId` int(11) NOT NULL,
  `Address1` varchar(200) NOT NULL,
  `Address2` varchar(200) NOT NULL,
  `Address3` varchar(200) NOT NULL,
  `CityId` int(11) NOT NULL,
  `StateId` int(11) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `contactPerson` varchar(30) NOT NULL,
  `ContactPersonMobile` bigint(20) NOT NULL,
  `CSTNo` varchar(20) NOT NULL,
  `VATNo` varchar(20) NOT NULL,
  `PANNo` varchar(20) NOT NULL,
  `ServiceTaxNo` varchar(20) NOT NULL,
  `DebitAmount` double(10,2) NOT NULL DEFAULT '0.00',
  `CreditAmount` double(10,2) NOT NULL DEFAULT '0.00',
  `IsFIxed` int(11) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `VatClassId` int(11) NOT NULL,
  `IntRate` int(11) NOT NULL,
  `IntRatePer` int(11) NOT NULL,
  `AMField1` varchar(50) DEFAULT NULL,
  `AMField2` varchar(50) DEFAULT NULL,
  `Link` int(11) DEFAULT NULL,
  `UseInPayroll` int(11) NOT NULL,
  `TeamId` varchar(255) NOT NULL,
  `AccountCode` varchar(10) DEFAULT NULL,
  `LogUser` int(11) DEFAULT NULL,
  `LogLocation` int(11) DEFAULT NULL,
  `LogSession` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `additional_prod_linking`
--

CREATE TABLE `additional_prod_linking` (
  `AddProductLinkingId` int(11) NOT NULL,
  `MainProductId` int(11) NOT NULL,
  `LinkProductId` int(11) NOT NULL,
  `LinkTypeId` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='linking purpose with product_master';

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand_master`
--

CREATE TABLE `brand_master` (
  `BrandId` int(11) NOT NULL,
  `BrandName` varchar(20) NOT NULL,
  `PrincipalCompanyId` int(11) NOT NULL,
  `AreaAlloted` double(10,2) NOT NULL,
  `IsFixed` bit(1) NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_master`
--

INSERT INTO `brand_master` (`BrandId`, `BrandName`, `PrincipalCompanyId`, `AreaAlloted`, `IsFixed`, `IsActive`) VALUES
(1, 'Mi1', 1, 13000.00, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `card_typemaster`
--

CREATE TABLE `card_typemaster` (
  `cardTypeID` int(11) NOT NULL,
  `CardTypeName` varchar(20) NOT NULL,
  `OnSaleValue` double(10,2) NOT NULL,
  `PointAwarded` int(11) NOT NULL,
  `RoundOffId` int(11) DEFAULT NULL,
  `RoundingLimit` double(10,2) NOT NULL,
  `ExtraPointsOnBirthday` int(11) NOT NULL,
  `PointToLinkedCustomer` int(11) NOT NULL,
  `PointToConvert` int(11) NOT NULL,
  `EquivalentCurrency` int(11) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1',
  `IsFixed` int(11) NOT NULL,
  `MarginDays` int(11) NOT NULL,
  `DiscountPer` double(10,2) NOT NULL,
  `CalExtraPointMethod` int(11) NOT NULL,
  `MultiplyPointBy` double(10,2) NOT NULL,
  `WeekDays` varchar(11) NOT NULL,
  `FromTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ToTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `RestrictedSG` int(11) NOT NULL,
  `SubscriptionDetail` int(11) NOT NULL,
  `AllowDiscountOnSG` int(11) NOT NULL,
  `ExcludeTaxInPoint` int(11) NOT NULL,
  `PointAwardedOnProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_typemaster`
--

INSERT INTO `card_typemaster` (`cardTypeID`, `CardTypeName`, `OnSaleValue`, `PointAwarded`, `RoundOffId`, `RoundingLimit`, `ExtraPointsOnBirthday`, `PointToLinkedCustomer`, `PointToConvert`, `EquivalentCurrency`, `IsActive`, `IsFixed`, `MarginDays`, `DiscountPer`, `CalExtraPointMethod`, `MultiplyPointBy`, `WeekDays`, `FromTime`, `ToTime`, `RestrictedSG`, `SubscriptionDetail`, `AllowDiscountOnSG`, `ExcludeTaxInPoint`, `PointAwardedOnProduct`) VALUES
(82, 'Card Type 1', 43.00, 2, 0, 3.00, 3, 2, 23, 1, 1, 1, 23, 10.00, 0, 4.00, '', '2018-10-20 11:00:00', '2018-10-20 11:00:00', 0, 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `CityId` int(11) NOT NULL,
  `CityName` varchar(25) NOT NULL,
  `StateId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`CityId`, `CityName`, `StateId`, `IsActive`, `IsFixed`) VALUES
(1, 'Pune', 1, b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `CountryId` int(11) NOT NULL,
  `CountryName` varchar(25) NOT NULL,
  `IsFixed` bit(1) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`CountryId`, `CountryName`, `IsFixed`, `IsActive`) VALUES
(2, 'India', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `cust_id` int(11) NOT NULL,
  `salutation` varchar(7) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `card_id` int(11) NOT NULL,
  `cust_typeid` varchar(10) NOT NULL,
  `allow_creditsale` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `opening_point` double NOT NULL,
  `earned_point` int(11) NOT NULL,
  `redeemed_point` int(11) NOT NULL,
  `balance_point` int(11) NOT NULL,
  `card_issuedate` date NOT NULL,
  `card_expiredate` date NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `address3` varchar(50) NOT NULL,
  `cityid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `phone` bigint(8) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `website` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `annivarsary` date NOT NULL,
  `spouse_name` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `picture` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `isfixed` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  `spent` int(11) NOT NULL,
  `deposit` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `card_assign` varchar(10) NOT NULL,
  `nationality` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `billing_address` smallint(6) NOT NULL,
  `deliverytype` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `send_email` int(11) NOT NULL,
  `send_sms` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `LogUser` varchar(20) NOT NULL,
  `finger_scan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_type_master`
--

CREATE TABLE `customer_type_master` (
  `id` int(11) NOT NULL,
  `CusTypeName` varchar(20) NOT NULL,
  `IsActive` int(1) NOT NULL DEFAULT '1' COMMENT '1=Active 0=Not Active',
  `IsFixed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_type_master`
--

INSERT INTO `customer_type_master` (`id`, `CusTypeName`, `IsActive`, `IsFixed`) VALUES
(149, 'Test', 1, 0),
(150, 'Check', 1, 1),
(151, 'Check1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department_master`
--

CREATE TABLE `department_master` (
  `DeptMasterId` int(11) NOT NULL,
  `DeptName` varchar(30) NOT NULL,
  `AreaAlloted` double(10,2) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_master`
--

INSERT INTO `department_master` (`DeptMasterId`, `DeptName`, `AreaAlloted`, `IsActive`, `IsFixed`) VALUES
(1, 'Dept 1', 12.00, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `gift_voucher_child`
--

CREATE TABLE `gift_voucher_child` (
  `GVCode` int(11) NOT NULL,
  `GiftVoucherId` int(11) NOT NULL,
  `Redeemed` int(11) NOT NULL,
  `RedeemedAmt` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CreateDate` int(11) NOT NULL,
  `LocCode` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ChildId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `SerialNumber` int(11) NOT NULL,
  `IsActive` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gift_voucher_master`
--

CREATE TABLE `gift_voucher_master` (
  `GiftVoucherId` int(11) NOT NULL,
  `GiftVoucherName` varchar(30) NOT NULL,
  `PrintName` varchar(30) NOT NULL,
  `ValidTillDate` date NOT NULL,
  `LocationIds` varchar(25) NOT NULL,
  `VoucherAmount` double NOT NULL,
  `MaxRedeem` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `StockJournalVoucherId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_master`
--

CREATE TABLE `group_master` (
  `GroupId` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `ParentGroupId` int(11) NOT NULL,
  `GroupTypeId` int(11) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `IsFixed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_master`
--

INSERT INTO `group_master` (`GroupId`, `GroupName`, `ParentGroupId`, `GroupTypeId`, `IsActive`, `IsFixed`) VALUES
(1, 'Test Parent', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_typemaster`
--

CREATE TABLE `group_typemaster` (
  `id` int(11) NOT NULL,
  `group_typeName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_typemaster`
--

INSERT INTO `group_typemaster` (`id`, `group_typeName`) VALUES
(1, 'Test1'),
(2, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `interest_rate_type_master`
--

CREATE TABLE `interest_rate_type_master` (
  `InterestRateId` int(11) NOT NULL,
  `InterestRateTypeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest_rate_type_master`
--

INSERT INTO `interest_rate_type_master` (`InterestRateId`, `InterestRateTypeName`) VALUES
(1, '30 Days Month'),
(2, '365 Days'),
(3, 'Calender Year');

-- --------------------------------------------------------

--
-- Table structure for table `list_master`
--

CREATE TABLE `list_master` (
  `ListTypeId` int(11) NOT NULL,
  `ListTypeName` varchar(25) NOT NULL COMMENT 'ex Size , Color , Floor',
  `IsActive` int(11) NOT NULL,
  `IsFixed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_master`
--

INSERT INTO `list_master` (`ListTypeId`, `ListTypeName`, `IsActive`, `IsFixed`) VALUES
(8, 'Color', 1, 1),
(9, 'Size', 1, 1),
(10, 'Weight', 1, 1),
(11, 'Height', 1, 1),
(12, 'Resolution', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_master`
--

CREATE TABLE `location_master` (
  `LocationId` int(11) NOT NULL,
  `LocationName` varchar(30) NOT NULL,
  `ComapnyName` varchar(80) NOT NULL,
  `LocationCode` varchar(30) NOT NULL,
  `CurrencyId` int(11) NOT NULL,
  `RegionId` int(11) NOT NULL,
  `FinancialYear` datetime NOT NULL,
  `BookBegin` datetime NOT NULL,
  `Address1` varchar(255) NOT NULL,
  `Address2` varchar(255) NOT NULL,
  `Address3` varchar(255) NOT NULL,
  `CityId` int(11) NOT NULL,
  `StateId` int(11) NOT NULL,
  `Region` varchar(40) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `Pincode` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Website` varchar(40) NOT NULL,
  `Remark` varchar(255) NOT NULL,
  `PanNo` varchar(20) NOT NULL,
  `CstNo` varchar(20) NOT NULL,
  `VatNo` varchar(20) NOT NULL,
  `ServiceTaxNo` varchar(20) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `SetLinkInfo` varchar(50) NOT NULL,
  `MethodOfLink` varchar(50) NOT NULL,
  `TimeInterval` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EmailAddress` varchar(50) NOT NULL,
  `EmailPassword` varchar(30) NOT NULL,
  `ExportFolder` varchar(30) NOT NULL,
  `ImportFolder` varchar(30) NOT NULL,
  `IsFixed` int(11) NOT NULL,
  `Target` int(11) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `Staff` int(11) NOT NULL,
  `Team` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matrix_list_master`
--

CREATE TABLE `matrix_list_master` (
  `MatrixListMasterId` int(11) NOT NULL,
  `DataName` varchar(30) NOT NULL COMMENT 'eg. X,Xl, Blue ,White etc',
  `MatListTypeId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrix_list_master`
--

INSERT INTO `matrix_list_master` (`MatrixListMasterId`, `DataName`, `MatListTypeId`, `IsActive`, `IsFixed`) VALUES
(1, 'X', 9, b'1', b'1'),
(2, 'XL', 9, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `matrix_master`
--

CREATE TABLE `matrix_master` (
  `MatrixId` int(11) NOT NULL,
  `MatrixName` varchar(30) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL,
  `Field1Name` varchar(35) NOT NULL,
  `Field1ListId` int(11) NOT NULL,
  `Field2Name` varchar(35) NOT NULL,
  `Field2ListId` int(11) NOT NULL,
  `Field3Name` varchar(35) NOT NULL,
  `Field3ListId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrix_master`
--

INSERT INTO `matrix_master` (`MatrixId`, `MatrixName`, `IsActive`, `IsFixed`, `Field1Name`, `Field1ListId`, `Field2Name`, `Field2ListId`, `Field3Name`, `Field3ListId`) VALUES
(4, 'T-shirt Matrix', b'1', b'1', 'Colors', 8, 'Sizes', 9, 'Weights', 10);

-- --------------------------------------------------------

--
-- Table structure for table `principle_company_master`
--

CREATE TABLE `principle_company_master` (
  `PCompanyId` int(11) NOT NULL,
  `PCompanyName` varchar(255) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principle_company_master`
--

INSERT INTO `principle_company_master` (`PCompanyId`, `PCompanyName`, `IsActive`, `IsFixed`) VALUES
(1, 'ABC', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `productitem_type_master`
--

CREATE TABLE `productitem_type_master` (
  `TypeId` int(11) NOT NULL,
  `TypeName` varchar(30) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productitem_type_master`
--

INSERT INTO `productitem_type_master` (`TypeId`, `TypeName`, `IsActive`) VALUES
(1, 'Inventory-Finished', b'1'),
(2, 'Raw Material', b'1'),
(3, 'Service', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `product_child_master`
--

CREATE TABLE `product_child_master` (
  `PCMId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ChildId` varchar(5) NOT NULL,
  `LocatrionCode` varchar(5) NOT NULL,
  `ProductChildId` varchar(11) NOT NULL,
  `PurchaseRate` decimal(10,2) NOT NULL,
  `MinusPercent` decimal(10,2) NOT NULL,
  `PlusPercent` decimal(10,2) NOT NULL,
  `PurchaseCost` decimal(10,2) NOT NULL,
  `MRP` double(10,2) NOT NULL,
  `MarkUp` double(10,2) NOT NULL,
  `Margin` double(10,2) NOT NULL,
  `Discount` double(10,2) NOT NULL,
  `SellingPrice` decimal(10,2) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `MatrixListId1` int(11) NOT NULL,
  `MatrixListId2` int(11) NOT NULL,
  `MatrixListId3` int(11) NOT NULL,
  `Field1` varchar(50) NOT NULL,
  `Field2` varchar(50) NOT NULL,
  `Field3` varchar(50) NOT NULL,
  `MatrixId` smallint(6) NOT NULL,
  `SpCommPercent` decimal(10,2) NOT NULL,
  `SpCommAmt` decimal(10,2) NOT NULL,
  `SchemeIDs` varchar(250) NOT NULL,
  `SchemeDisc` decimal(10,2) NOT NULL,
  `Link` varchar(512) NOT NULL,
  `MfgDate` date NOT NULL,
  `Best` smallint(6) NOT NULL,
  `PeoductBefore` smallint(6) NOT NULL,
  `ExpDate` date NOT NULL,
  `CreationDate` datetime NOT NULL,
  `RecordDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_group_master`
--

CREATE TABLE `product_group_master` (
  `PGroupMId` int(11) NOT NULL,
  `PGroupMName` varchar(25) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_group_master`
--

INSERT INTO `product_group_master` (`PGroupMId`, `PGroupMName`, `DepartmentId`, `IsActive`, `IsFixed`) VALUES
(0, 'Group 1', 1, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `product_layer_config`
--

CREATE TABLE `product_layer_config` (
  `ProdLayerConfId` int(11) NOT NULL,
  `MainProductId` int(11) NOT NULL,
  `LayeredProductId` int(11) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Product and its layers configuration -customize product sale';

-- --------------------------------------------------------

--
-- Table structure for table `product_linking_type`
--

CREATE TABLE `product_linking_type` (
  `ProdLinkingTypeId` int(11) NOT NULL,
  `TypeName` varchar(30) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='to manage linking like flavour or additional product';

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `productId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `PrintName` varchar(50) NOT NULL,
  `UPCEAN` varchar(20) NOT NULL,
  `UserDefinedCode` varchar(16) NOT NULL,
  `MRP` double(10,2) NOT NULL,
  `BrandId` int(5) NOT NULL,
  `SubgroupId` int(5) NOT NULL,
  `ProductGroupId` int(5) NOT NULL,
  `DepartmentId` int(5) NOT NULL,
  `UnitId` int(5) NOT NULL,
  `BinLocation` varchar(10) NOT NULL,
  `MatrixId` int(3) NOT NULL,
  `EvalCount` int(3) NOT NULL,
  `TaxIdPurchase` int(3) NOT NULL,
  `TaxIdSale` int(3) NOT NULL,
  `PrintBarcode` int(3) NOT NULL,
  `AskRate` int(3) NOT NULL,
  `UseFifo` int(3) NOT NULL,
  `ProductMsg` varchar(255) NOT NULL,
  `QuantityOnHand` double(10,2) NOT NULL,
  `ReorderInfo` int(3) NOT NULL,
  `ReorderLevel` double(10,2) NOT NULL,
  `SafetyLevel` double(10,2) NOT NULL,
  `ReorderQty` double(10,2) NOT NULL,
  `MinimumOrderQty` double(10,2) NOT NULL,
  `StandardSalePrice` double(10,2) NOT NULL,
  `StandardCostPrice` double(10,2) NOT NULL,
  `ProductDIscount` double(10,2) NOT NULL,
  `AllowOperatorDiscount` int(3) NOT NULL,
  `ProductRemark` varchar(255) NOT NULL,
  `Picture1` varchar(500) NOT NULL,
  `Picture2` varchar(500) NOT NULL,
  `RecipeComponents` int(3) NOT NULL,
  `RecordDateTime` date NOT NULL,
  `CompanyId` int(3) NOT NULL,
  `SessionId` varchar(6) NOT NULL,
  `IsActive` int(2) NOT NULL,
  `IsFixed` int(2) NOT NULL,
  `AlternateUnitId` int(3) NOT NULL,
  `ChangeConversion` int(3) NOT NULL,
  `ItemType` int(3) NOT NULL,
  `WeighingScaleExport` int(3) NOT NULL,
  `WeighingScaleConversion` int(3) NOT NULL,
  `GenerateProduction` int(3) NOT NULL,
  `PrintNameOther` varchar(35) NOT NULL,
  `GenerateProductChild` int(5) NOT NULL,
  `CoupanFile` varchar(500) NOT NULL,
  `SpCommPercent` double(10,2) NOT NULL,
  `SpCommAmt` double(10,2) NOT NULL,
  `SchemeIds` varchar(250) NOT NULL,
  `PMField1` varchar(250) NOT NULL,
  `PMField2` varchar(250) NOT NULL,
  `PMField3` varchar(250) NOT NULL,
  `PMField4` varchar(250) NOT NULL,
  `PMField5` varchar(250) NOT NULL,
  `CalNetWeight` int(3) NOT NULL,
  `BarcodeRatio` double(10,2) NOT NULL,
  `Link` varchar(512) NOT NULL,
  `AskQuantity` int(3) NOT NULL,
  `AskContainer` int(3) NOT NULL,
  `ServiceItem` varchar(4) NOT NULL,
  `Rate` double(10,2) NOT NULL,
  `Prediocity` int(2) NOT NULL,
  `UPCEAN1` varchar(20) NOT NULL,
  `UPCEAN2` varchar(20) NOT NULL,
  `UPCEAN3` varchar(20) NOT NULL,
  `TeamId` varchar(50) NOT NULL,
  `ChangeContainerWeight` int(3) NOT NULL,
  `SaleActId` int(3) NOT NULL,
  `SaleReturnActId` int(3) NOT NULL,
  `PurchaseActId` int(3) NOT NULL,
  `PurchaseReturnActId` int(3) NOT NULL,
  `TaxableValue` double(10,2) NOT NULL,
  `LogUser` int(3) NOT NULL,
  `LogLocation` int(3) NOT NULL,
  `LogSession` varchar(6) NOT NULL,
  `WebGroupId` int(3) NOT NULL,
  `WebSubGroupId` int(3) NOT NULL,
  `WebItemName` varchar(500) NOT NULL,
  `IsRecommended` int(3) NOT NULL,
  `FoodType` int(3) NOT NULL,
  `Spicelevel` int(3) NOT NULL,
  `WebProductName` varchar(50) NOT NULL,
  `COnvertProductId` varchar(4) NOT NULL,
  `COnvertQty` double(10,2) NOT NULL,
  `IsMultiLayered` bit(1) NOT NULL COMMENT '1=yes 0=no -- to ckeck where it is layred cake or not if yes then display layered configuration to customer like layer 1 -(inside layer , outside layer)',
  `LayerCount` int(11) NOT NULL COMMENT 'total Number of layers'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_subgroup_master`
--

CREATE TABLE `product_subgroup_master` (
  `PSubGroupId` int(11) NOT NULL,
  `ProductSubGroupName` varchar(25) NOT NULL,
  `ParentId` int(11) NOT NULL,
  `PGroupId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subgroup_master`
--

INSERT INTO `product_subgroup_master` (`PSubGroupId`, `ProductSubGroupName`, `ParentId`, `PGroupId`, `IsActive`, `IsFixed`) VALUES
(0, 'Sub group 1', 0, 0, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `slider_master`
--

CREATE TABLE `slider_master` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_master`
--

INSERT INTO `slider_master` (`id`, `image_path`) VALUES
(11, 'slide1.jpg'),
(12, 'slide2.jpg'),
(13, 'slide3.jpg'),
(14, 'slide4.jpg'),
(15, 'slide5.jpg'),
(16, 'slide6.jpg'),
(17, 'slide7.jpg'),
(18, 'slide8.jpg'),
(19, 'slide9.jpg'),
(20, 'slide10.JPG'),
(21, 'slide11.JPG'),
(22, 'slide12.JPG'),
(23, 'slide13.JPG'),
(24, 'slide14.JPG'),
(25, 'slide15.JPG'),
(26, 'slide16.JPG'),
(27, 'slide17.JPG'),
(28, 'slide18.JPG'),
(29, 'slide19.JPG'),
(30, 'slide20.JPG'),
(31, 'slide21.JPG'),
(32, 'slide22.JPG'),
(33, 'slide23.JPG'),
(34, 'slide24.JPG'),
(35, 'slide25.JPG'),
(36, 'slide26.JPG'),
(37, 'slide27.JPG'),
(38, 'slide28.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(25) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `IsFixed` bit(1) NOT NULL,
  `CountryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`StateId`, `StateName`, `IsActive`, `IsFixed`, `CountryId`) VALUES
(1, 'Maharashtra', b'0', b'0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tax_master`
--

CREATE TABLE `tax_master` (
  `TaxId` int(11) NOT NULL,
  `TaxName` varchar(30) NOT NULL,
  `IncludedInRate` int(11) NOT NULL,
  `TaxValue` double(10,2) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `IsFixed` int(11) NOT NULL,
  `CalMethod` bit(1) NOT NULL COMMENT 'calc method --> 1=default means disocunt then tax on amt after giving discount 2=qty * rate means tax on base final amount and then add after discount value'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_master`
--

INSERT INTO `tax_master` (`TaxId`, `TaxName`, `IncludedInRate`, `TaxValue`, `IsActive`, `IsFixed`, `CalMethod`) VALUES
(1, 'Test Tax', 0, 12.00, 1, 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `team_master`
--

CREATE TABLE `team_master` (
  `id` int(11) NOT NULL,
  `TeamName` varchar(20) NOT NULL,
  `IsFixed` int(11) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_master`
--

INSERT INTO `team_master` (`id`, `TeamName`, `IsFixed`, `IsActive`) VALUES
(1, 'Team1', 1, 1),
(2, 'Team2', 1, 1),
(3, 'Team3', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `udf_master`
--

CREATE TABLE `udf_master` (
  `UDFModuleId` int(11) NOT NULL,
  `UDFModuleName` varchar(30) NOT NULL,
  `FieldCaption1` varchar(32) NOT NULL,
  `FieldDataTypeId1` smallint(6) NOT NULL,
  `ListId1` smallint(6) NOT NULL,
  `FieldCaption2` int(11) NOT NULL,
  `FieldDataTypeId2` int(11) NOT NULL,
  `ListId2` int(11) NOT NULL,
  `FieldCaption3` int(11) NOT NULL,
  `FieldDataTypeId3` int(11) NOT NULL,
  `ListId3` int(11) NOT NULL,
  `FieldCaption4` int(11) NOT NULL,
  `FieldDataTypeId4` int(11) NOT NULL,
  `ListId4` int(11) NOT NULL,
  `FieldCaption5` int(11) NOT NULL,
  `FieldDataTypeId5` int(11) NOT NULL,
  `ListId5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

CREATE TABLE `unit_master` (
  `UnitId` int(11) NOT NULL,
  `UnitName` varchar(25) NOT NULL,
  `FormalName` varchar(25) NOT NULL,
  `DigitAfterDecimal` smallint(1) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsFixed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`UnitId`, `UnitName`, `FormalName`, `DigitAfterDecimal`, `IsActive`, `IsFixed`) VALUES
(1, 'Test Tax', 'test', 12, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays_master`
--

CREATE TABLE `weekdays_master` (
  `WeekDaysId` int(11) NOT NULL,
  `Day` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays_master`
--

INSERT INTO `weekdays_master` (`WeekDaysId`, `Day`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_master`
--
ALTER TABLE `account_master`
  ADD PRIMARY KEY (`AccountId`);

--
-- Indexes for table `additional_prod_linking`
--
ALTER TABLE `additional_prod_linking`
  ADD PRIMARY KEY (`AddProductLinkingId`);

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_master`
--
ALTER TABLE `brand_master`
  ADD PRIMARY KEY (`BrandId`);

--
-- Indexes for table `card_typemaster`
--
ALTER TABLE `card_typemaster`
  ADD PRIMARY KEY (`cardTypeID`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`CityId`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customer_type_master`
--
ALTER TABLE `customer_type_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_master`
--
ALTER TABLE `department_master`
  ADD PRIMARY KEY (`DeptMasterId`);

--
-- Indexes for table `gift_voucher_child`
--
ALTER TABLE `gift_voucher_child`
  ADD PRIMARY KEY (`GVCode`);

--
-- Indexes for table `gift_voucher_master`
--
ALTER TABLE `gift_voucher_master`
  ADD PRIMARY KEY (`GiftVoucherId`);

--
-- Indexes for table `group_master`
--
ALTER TABLE `group_master`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `group_typemaster`
--
ALTER TABLE `group_typemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_rate_type_master`
--
ALTER TABLE `interest_rate_type_master`
  ADD PRIMARY KEY (`InterestRateId`);

--
-- Indexes for table `list_master`
--
ALTER TABLE `list_master`
  ADD PRIMARY KEY (`ListTypeId`);

--
-- Indexes for table `location_master`
--
ALTER TABLE `location_master`
  ADD PRIMARY KEY (`LocationId`);

--
-- Indexes for table `matrix_list_master`
--
ALTER TABLE `matrix_list_master`
  ADD PRIMARY KEY (`MatrixListMasterId`);

--
-- Indexes for table `matrix_master`
--
ALTER TABLE `matrix_master`
  ADD PRIMARY KEY (`MatrixId`);

--
-- Indexes for table `principle_company_master`
--
ALTER TABLE `principle_company_master`
  ADD PRIMARY KEY (`PCompanyId`);

--
-- Indexes for table `productitem_type_master`
--
ALTER TABLE `productitem_type_master`
  ADD PRIMARY KEY (`TypeId`);

--
-- Indexes for table `product_child_master`
--
ALTER TABLE `product_child_master`
  ADD PRIMARY KEY (`PCMId`);

--
-- Indexes for table `product_layer_config`
--
ALTER TABLE `product_layer_config`
  ADD PRIMARY KEY (`ProdLayerConfId`);

--
-- Indexes for table `product_linking_type`
--
ALTER TABLE `product_linking_type`
  ADD PRIMARY KEY (`ProdLinkingTypeId`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `slider_master`
--
ALTER TABLE `slider_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`StateId`);

--
-- Indexes for table `tax_master`
--
ALTER TABLE `tax_master`
  ADD PRIMARY KEY (`TaxId`);

--
-- Indexes for table `team_master`
--
ALTER TABLE `team_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `udf_master`
--
ALTER TABLE `udf_master`
  ADD PRIMARY KEY (`UDFModuleId`);

--
-- Indexes for table `unit_master`
--
ALTER TABLE `unit_master`
  ADD PRIMARY KEY (`UnitId`);

--
-- Indexes for table `weekdays_master`
--
ALTER TABLE `weekdays_master`
  ADD PRIMARY KEY (`WeekDaysId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_master`
--
ALTER TABLE `account_master`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `additional_prod_linking`
--
ALTER TABLE `additional_prod_linking`
  MODIFY `AddProductLinkingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_master`
--
ALTER TABLE `brand_master`
  MODIFY `BrandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_typemaster`
--
ALTER TABLE `card_typemaster`
  MODIFY `cardTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_type_master`
--
ALTER TABLE `customer_type_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `department_master`
--
ALTER TABLE `department_master`
  MODIFY `DeptMasterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_voucher_child`
--
ALTER TABLE `gift_voucher_child`
  MODIFY `GVCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_voucher_master`
--
ALTER TABLE `gift_voucher_master`
  MODIFY `GiftVoucherId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_master`
--
ALTER TABLE `group_master`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_typemaster`
--
ALTER TABLE `group_typemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `interest_rate_type_master`
--
ALTER TABLE `interest_rate_type_master`
  MODIFY `InterestRateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_master`
--
ALTER TABLE `list_master`
  MODIFY `ListTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location_master`
--
ALTER TABLE `location_master`
  MODIFY `LocationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matrix_list_master`
--
ALTER TABLE `matrix_list_master`
  MODIFY `MatrixListMasterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matrix_master`
--
ALTER TABLE `matrix_master`
  MODIFY `MatrixId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `principle_company_master`
--
ALTER TABLE `principle_company_master`
  MODIFY `PCompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productitem_type_master`
--
ALTER TABLE `productitem_type_master`
  MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_child_master`
--
ALTER TABLE `product_child_master`
  MODIFY `PCMId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_layer_config`
--
ALTER TABLE `product_layer_config`
  MODIFY `ProdLayerConfId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_linking_type`
--
ALTER TABLE `product_linking_type`
  MODIFY `ProdLinkingTypeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_master`
--
ALTER TABLE `slider_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_master`
--
ALTER TABLE `tax_master`
  MODIFY `TaxId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_master`
--
ALTER TABLE `team_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `udf_master`
--
ALTER TABLE `udf_master`
  MODIFY `UDFModuleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_master`
--
ALTER TABLE `unit_master`
  MODIFY `UnitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weekdays_master`
--
ALTER TABLE `weekdays_master`
  MODIFY `WeekDaysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
