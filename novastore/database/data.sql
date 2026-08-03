-- Categories
INSERT INTO category(categoryName) VALUES
('Electronics'),
('Clothing'),
('Home & Kitchen'),
('Sports & Fitness'),
('Books'),
('Personal Care');

INSERT INTO products
(barcode, name, description, unitPrice, stockQuantity, insertionDate, imageReference, categoryID)
VALUES
('ELEC001','Wireless Mouse','Ergonomic wireless mouse with USB receiver',19.99,120,'2026-01-05 10:15:00','assets/images/Electronics/wireless-mouse.jpg',1),
('ELEC002','Mechanical Keyboard','RGB mechanical gaming keyboard',59.99,75,'2026-01-14 14:32:00','assets/images/Electronics/mechanical-keyboard.jpg',1),
('ELEC003','Bluetooth Speaker','Portable Bluetooth speaker with deep bass',39.99,60,'2026-01-28 09:47:00','assets/images/Electronics/bluetooth-speaker.jpg',1),
('ELEC004','USB-C Charger','Fast charging USB-C wall adapter',24.99,90,'2026-02-03 16:21:00','assets/images/Electronics/USB-C-Charger.jpg',1),
('ELEC005','Webcam HD','1080p HD webcam for video calls',44.99,35,'2026-02-12 11:05:00','assets/images/Electronics/WebcamHD.jpg',1),
('ELEC006','Gaming Headset','Noise-canceling gaming headset',69.99,50,'2026-02-25 18:40:00','assets/images/Electronics/Gaming-Headset.jpg',1),
('ELEC007','External SSD 500GB','High-speed portable SSD storage',79.99,40,'2026-03-06 08:55:00','assets/images/Electronics/External-SSD.jpg',1),
('ELEC008','Wireless Earbuds','Bluetooth earbuds with charging case',49.99,85,'2026-03-17 13:12:00','assets/images/Electronics/earbuds.jpg',1),
('ELEC009','Smart Watch','Fitness tracking smartwatch',129.99,25,'2026-03-29 15:44:00','assets/images/Electronics/smart-watch.jpg',1),
('ELEC010','Laptop Stand','Adjustable aluminum laptop stand',29.99,70,'2026-04-08 10:08:00','assets/images/Electronics/laptop-stand.png',1),
('ELEC011','Power Bank 10000mAh','Portable battery pack',34.99,100,'2026-04-19 17:25:00','assets/images/Electronics/PowerBank.jpg',1),
('ELEC012','Monitor 24 Inch','Full HD LED monitor',149.99,30,'2026-04-30 12:50:00','assets/images/Electronics/Monitor24Inch.jpg',1),
('ELEC013','Phone Tripod','Adjustable smartphone tripod',22.99,55,'2026-05-09 09:18:00','assets/images/Electronics/phoneTripod.jpg',1),
('ELEC014','Wireless Charger','Qi-certified charging pad',27.99,65,'2026-05-18 14:39:00','assets/images/Electronics/WirelessCharger.jpg',1),
('ELEC015','Action Camera','Waterproof action camera',99.99,20,'2026-05-27 19:07:00','assets/images/Electronics/ActionCamera.jpg',1),
('ELEC016','USB Hub','4-port USB 3.0 hub',18.99,80,'2026-06-06 11:33:00','assets/images/Electronics/USBHUB.jpg',1),
('ELEC017','Smart Home Plug','WiFi-enabled smart plug',16.99,95,'2026-06-18 16:52:00','assets/images/Electronics/smart-Home_Plug.jpg',1);

INSERT INTO products
(barcode, name, description, unitPrice, stockQuantity, insertionDate, imageReference, categoryID)
VALUES
('CLOT001','Basic T-Shirt','100% cotton crew neck t-shirt',14.99,200,'2026-01-03 09:10:00','assets/images/Clothing/Basic-T-Shirt.jpg',2),
('CLOT002','Slim Fit Jeans','Comfortable blue denim jeans',39.99,120,'2026-01-11 14:25:00','assets/images/Clothing/Slim-Fit-Jeans.jpg',2),
('CLOT003','Hoodie','Fleece-lined pullover hoodie',34.99,90,'2026-01-19 18:40:00','assets/images/Clothing/Hoodie.jpg',2),
('CLOT004','Polo Shirt','Classic short-sleeve polo shirt',24.99,80,'2026-01-27 10:05:00','assets/images/Clothing/Polo-Shirt.jpg',2),
('CLOT005','Running Shorts','Lightweight athletic shorts',19.99,140,'2026-02-04 12:33:00','assets/images/Clothing/Running-Shoes.jpg',2),
('CLOT006','Winter Jacket','Insulated winter jacket',89.99,35,'2026-02-12 16:50:00','assets/images/Clothing/Winter-Jacket.jpg',2),
('CLOT007','Dress Shirt','Formal button-down shirt',29.99,75,'2026-02-20 09:18:00','assets/images/Clothing/Dress-Shirt.jpg',2),
('CLOT008','Sweatpants','Comfortable fleece sweatpants',27.99,95,'2026-02-28 13:44:00','assets/images/Clothing/SweatPants.jpg',2),
('CLOT009','Baseball Cap','Adjustable cotton cap',12.99,150,'2026-03-07 11:22:00','assets/images/Clothing/Baseball-Cap.jpg',2),
('CLOT010','Sneakers','Casual everyday sneakers',59.99,70,'2026-03-15 17:36:00','assets/images/Clothing/Sneakers.jpg',2),
('CLOT011','Socks Pack','Pack of five cotton socks',9.99,200,'2026-03-23 08:55:00','assets/images/Clothing/Socks-Pack.jpg',2),
('CLOT012','Leather Belt','Classic leather belt',18.99,90,'2026-04-01 14:10:00','assets/images/Clothing/Leather-Belt.jpg',2),
('CLOT013','Tank Top','Sleeveless cotton tank top',11.99,110,'2026-04-09 09:47:00','assets/images/Clothing/Tank-Top.jpg',2),
('CLOT014','Cardigan','Soft knit cardigan sweater',44.99,45,'2026-04-18 15:30:00','assets/images/Clothing/Cardigan.jpg',2),
('CLOT015','Raincoat','Water-resistant raincoat',49.99,30,'2026-05-02 10:20:00','assets/images/Clothing/RainCoat.jpg',2),
('CLOT016','Scarf','Warm winter scarf',15.99,100,'2026-05-15 18:05:00','assets/images/Clothing/Scarf.jpg',2),
('CLOT017','Gloves','Insulated winter gloves',17.99,85,'2026-06-10 12:40:00','assets/images/Clothing/Gloves.jpg',2);

INSERT INTO products
(barcode, name, description, unitPrice, stockQuantity, insertionDate, imageReference, categoryID)
VALUES
('HOME001','Coffee Maker','Programmable drip coffee maker',79.99,25,'2026-01-04 08:15:00','assets/images/Home-Kitchen/Coffee-Maker.jpg',3),
('HOME002','Electric Kettle','1.7L stainless steel kettle',34.99,50,'2026-01-13 12:30:00','assets/images/Home-Kitchen/Electric-Kettle.jpg',3),
('HOME003','Blender','High-speed kitchen blender',59.99,40,'2026-01-22 17:45:00','assets/images/Home-Kitchen/Blender.png',3),
('HOME004','Cookware Set','10-piece non-stick cookware set',129.99,20,'2026-02-02 10:20:00','assets/images/Home-Kitchen/Cookware Set.jpg',3),
('HOME005','Knife Set','Stainless steel kitchen knives',49.99,35,'2026-02-11 14:55:00','assets/images/Home-Kitchen/Knife-Set.jpg',3),
('HOME006','Toaster','2-slice electric toaster',29.99,60,'2026-02-19 09:10:00','assets/images/Home-Kitchen/Toaster.jpg',3),
('HOME007','Vacuum Cleaner','Bagless upright vacuum cleaner',149.99,15,'2026-02-28 16:40:00','assets/images/Home-Kitchen/Vacuum-Cleaner.jpg',3),
('HOME008','Air Fryer','Digital air fryer with timer',99.99,30,'2026-03-08 11:25:00','assets/images/Home-Kitchen/Air-Fryer.jpg',3),
('HOME009','Desk Lamp','LED adjustable desk lamp',24.99,80,'2026-03-16 18:05:00','assets/images/Home-Kitchen/Desk-Lamp.jpg',3),
('HOME010','Storage Box','Large plastic storage container',14.99,100,'2026-03-25 09:50:00','assets/images/Home-Kitchen/Storage-Box.jpg',3),
('HOME011','Dining Plates Set','Ceramic plate set of six',39.99,45,'2026-04-03 13:15:00','assets/images/Home-Kitchen/Dining-Plates-Set.jpg',3),
('HOME012','Bed Sheet Set','Queen-size microfiber sheets',34.99,55,'2026-04-12 10:35:00','assets/images/Home-Kitchen/Bed-Sheet-Set.jpg',3),
('HOME013','Laundry Basket','Foldable laundry basket',12.99,90,'2026-04-20 17:00:00','assets/images/Home-Kitchen/Laundry-Basket.jpg',3),
('HOME014','Wall Clock','Modern decorative wall clock',19.99,70,'2026-05-01 09:25:00','assets/images/Home-Kitchen/Wall-Clock.jpg',3),
('HOME015','Water Filter Pitcher','Household water filter pitcher',29.99,40,'2026-05-14 15:40:00','assets/images/Home-Kitchen/Water-Filter-Pitcher.jpg',3),
('HOME016','Rice Cooker','Automatic rice cooker',54.99,35,'2026-05-28 12:10:00','assets/images/Home-Kitchen/Rice-Cooker.jpg',3),
('HOME017','Food Storage Containers','Set of airtight containers',26.99,75,'2026-06-12 18:35:00','assets/images/Home-Kitchen/Food-Storage-Containers.jpg',3);

INSERT INTO products
(barcode, name, description, unitPrice, stockQuantity, insertionDate, imageReference, categoryID)
VALUES
('SPRT001','Yoga Mat','Non-slip exercise yoga mat',24.99,80,'2026-01-06 09:10:00','assets/images/Sports-Fitness/Yoga-Mat.jpg',4),
('SPRT002','Dumbbell Set','Adjustable dumbbell pair',89.99,25,'2026-01-15 14:35:00','assets/images/Sports-Fitness/Dumbbell-Set.jpg',4),
('SPRT003','Resistance Bands','Set of resistance bands',19.99,120,'2026-01-24 18:20:00','assets/images/Sports-Fitness/Resistance-Bands.png',4),
('SPRT004','Basketball','Official size basketball',29.99,50,'2026-02-03 11:05:00','assets/images/Sports-Fitness/Basketball.jpg',4),
('SPRT005','Football','Durable training football',24.99,60,'2026-02-11 16:40:00','assets/images/Sports-Fitness/Football.jpg',4),
('SPRT006','Tennis Racket','Lightweight tennis racket',79.99,20,'2026-02-20 09:25:00','assets/images/Sports-Fitness/Tennis-Racket.jpg',4),
('SPRT007','Jump Rope','Adjustable speed jump rope',12.99,150,'2026-02-28 13:55:00','assets/images/Sports-Fitness/Jump-Rope.jpg',4),
('SPRT008','Protein Shaker','Leak-proof shaker bottle',9.99,200,'2026-03-07 10:10:00','assets/images/Sports-Fitness/Protein-Shaker.jpg',4),
('SPRT009','Exercise Ball','Anti-burst fitness ball',22.99,45,'2026-03-16 17:30:00','assets/images/Sports-Fitness/Exercise-Ball.jpg',4),
('SPRT010','Cycling Helmet','Protective bike helmet',49.99,35,'2026-03-25 12:45:00','assets/images/Sports-Fitness/Cycling-Helmet.jpg',4),
('SPRT011','Running Shoes','Lightweight running shoes',74.99,40,'2026-04-02 09:15:00','assets/images/Sports-Fitness/Running-Shoes.jpg',4),
('SPRT012','Fitness Tracker','Activity tracking wristband',59.99,30,'2026-04-10 15:50:00','assets/images/Sports-Fitness/Fitness-Tracker.jpg',4),
('SPRT013','Pull-Up Bar','Doorway pull-up bar',34.99,50,'2026-04-18 11:20:00','assets/images/Sports-Fitness/Pull-Up-Bar.png',4),
('SPRT014','Boxing Gloves','Training boxing gloves',39.99,45,'2026-05-01 18:05:00','assets/images/Sports-Fitness/Boxing-Gloves.jpg',4),
('SPRT015','Camping Tent','2-person outdoor tent',119.99,15,'2026-05-14 08:40:00','assets/images/Sports-Fitness/Camping-Tent.jpg',4),
('SPRT016','Sleeping Bag','Compact camping sleeping bag',49.99,25,'2026-05-28 14:25:00','assets/images/Sports-Fitness/Sleeping-Bag.jpg',4),
('SPRT017','Water Bottle','Insulated stainless bottle',17.99,100,'2026-06-15 10:55:00','assets/images/Sports-Fitness/Water-Bottle.jpg',4);

INSERT INTO products
(barcode, name, description, unitPrice, stockQuantity, insertionDate, imageReference, categoryID)
VALUES
('BOOK001','Learn PHP','Beginner guide to PHP development',24.99,70,'2026-01-05 10:10:00','assets/images/Books/Learn-PHP.png',5),
('BOOK002','Mastering JavaScript','Advanced JavaScript concepts',29.99,50,'2026-01-13 15:25:00','assets/images/Books/Mastering-JavaScript.jpg',5),
('BOOK003','Database Design','Practical database design book',34.99,40,'2026-01-21 18:40:00','assets/images/Books/Database-Design.jpg',5),
('BOOK004','Algorithms Explained','Introduction to algorithms',39.99,35,'2026-02-02 09:30:00','assets/images/Books/Algorithms-Explained.jpg',5),
('BOOK005','Clean Code','Best practices for developers',32.99,30,'2026-02-10 14:55:00','assets/images/Books/Clean-Code.jpg',5),
('BOOK006','Web Development','HTML CSS and JavaScript',22.99,60,'2026-02-18 11:20:00','assets/images/Books/Web-Development-Basics.jpg',5),
('BOOK007','Data Structures','Fundamentals of data structures',28.99,45,'2026-02-26 16:45:00','assets/images/Books/Data-Structures.jpg',5),
('BOOK008','Python Programming','Comprehensive Python guide',35.99,55,'2026-03-06 09:15:00','assets/images/Books/Python-Programming.jpg',5),
('BOOK009','Artificial Intelligence','AI concepts and applications',42.99,25,'2026-03-14 13:40:00','assets/images/Books/Artificial-Intelligence.jpg',5),
('BOOK010','Cybersecurity Essentials','Introduction to cybersecurity',31.99,40,'2026-03-22 18:10:00','assets/images/Books/Cybersecurity-Essentials.jpg',5),
('BOOK011','Networking','Computer networking basics',27.99,50,'2026-04-01 10:05:00','assets/images/Books/Networking-Fundamentals.jpg',5),
('BOOK012','Software Engineering','Software development lifecycle',36.99,30,'2026-04-09 15:30:00','assets/images/Books/Software-Engineering.jpg',5),
('BOOK013','Cloud Computing','Cloud technologies explained',33.99,35,'2026-04-17 12:25:00','assets/images/Books/Cloud-Computing.jpg',5),
('BOOK014','Machine Learning','ML concepts for beginners',38.99,25,'2026-05-03 17:50:00','assets/images/Books/Machine-Learning.jpg',5),
('BOOK015','Operating Systems','Operating system principles',29.99,45,'2026-05-18 09:35:00','assets/images/Books/Operating-Systems.jpg',5),
('BOOK016','Computer Architecture','Hardware and architecture',34.99,40,'2026-06-08 14:20:00','assets/images/Books/Computer-Architecture.jpg',5),
('BOOK017','Advanced Programming','Deep dive into programming paradigms',44.99,20,'2026-06-20 11:10:00','assets/images/Books/Advanced-Programming-Concepts.jpg',5);

INSERT INTO products
(barcode, name, description, unitPrice, stockQuantity, insertionDate, imageReference, categoryID)
VALUES
('BEAU001','Face Wash','Gentle daily facial cleanser',12.99,120,'2026-01-04 09:15:00','assets/images/Personal-Care/Face-Wash.jpg',6),
('BEAU002','Moisturizing Cream','Hydrating skin moisturizer',18.99,90,'2026-01-12 14:40:00','assets/images/Personal-Care/Moisturizing-Cream.jpg',6),
('BEAU003','Shampoo','Nourishing hair shampoo',9.99,150,'2026-01-20 10:25:00','assets/images/Personal-Care/Shampoo.jpg',6),
('BEAU004','Conditioner','Hair repair conditioner',10.99,140,'2026-01-28 16:50:00','assets/images/Personal-Care/Conditioner.jpg',6),
('BEAU005','Body Lotion','Refreshing body lotion',14.99,100,'2026-02-05 11:10:00','assets/images/Personal-Care/Body-Lotion.jpg',6),
('BEAU006','Sunscreen SPF50','Broad spectrum sun protection',16.99,80,'2026-02-13 15:35:00','assets/images/Personal-Care/Sunscreen-SPF50.jpg',6),
('BEAU007','Lip Balm','Moisturizing lip balm',4.99,200,'2026-02-21 09:20:00','assets/images/Personal-Care/Lip-Balm.jpg',6),
('BEAU008','Perfume','Long-lasting fragrance',49.99,40,'2026-03-02 18:45:00','assets/images/Personal-Care/Perfume.jpg',6),
('BEAU009','Electric Toothbrush','Rechargeable toothbrush',39.99,50,'2026-03-10 12:30:00','assets/images/Personal-Care/Electric-Toothbrush.jpg',6),
('BEAU010','Hair Dryer','Professional hair dryer',34.99,35,'2026-03-18 17:05:00','assets/images/Personal-Care/Hair-Dryer.jpg',6),
('BEAU011','Beard Trimmer','Cordless beard trimmer',29.99,45,'2026-03-26 10:15:00','assets/images/Personal-Care/Beard-Trimmer.jpg',6),
('BEAU012','Face Mask Pack','Set of hydrating face masks',15.99,70,'2026-04-04 14:50:00','assets/images/Personal-Care/Face-Mask-Pack.jpg',6),
('BEAU013','Hand Cream','Moisturizing hand cream',7.99,120,'2026-04-12 09:35:00','assets/images/Personal-Care/Hand-Cream.jpg',6),
('BEAU014','Makeup Brush Set','Professional makeup brushes',24.99,55,'2026-04-20 16:20:00','assets/images/Personal-Care/Makeup-Brush-Set.jpg',6),
('BEAU015','Nail Care Kit','Complete nail grooming kit',19.99,60,'2026-05-06 11:45:00','assets/images/Personal-Care/Nail-Care-Kit.jpg',6),
('BEAU016','Body Scrub','Exfoliating body scrub',13.99,85,'2026-05-22 18:10:00','assets/images/Personal-Care/Body-Scrub.jpg',6),
('BEAU017','Hair Serum','Repair and shine hair serum',21.99,75,'2026-06-18 10:55:00','assets/images/Personal-Care/Hair-Serum.jpg',6);