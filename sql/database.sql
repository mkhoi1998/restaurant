CREATE TABLE HOME
(
    HTITTLE VARCHAR(10) PRIMARY KEY,
    HCONTAIN TEXT
);

CREATE TABLE RESTAURANT
(
    RID INT auto_increment PRIMARY KEY ,
    RCONTAIN text
);
CREATE TABLE RES_IMG
(
    RIID INT PRIMARY KEY AUTO_INCREMENT,
    RIMG VARCHAR(200)
);

CREATE TABLE CONTACT
(
    CTITTLE VARCHAR(10) PRIMARY KEY,
    CNAME TEXT,
    CEMAIL VARCHAR(30),
    CPHONE VARCHAR(10),
    CADDRESS INT,
    CSTREET VARCHAR(50),
    CPROVINCE VARCHAR(10),
    COPEN INT,
    CCLOSE INT,
    CMAP TEXT
);

CREATE TABLE WEBADMIN
(
    AUSERNAME VARCHAR(10) PRIMARY KEY,
    APASSWORD VARCHAR(20)
);

CREATE TABLE WEBACCOUNT
(
    UEMAIL VARCHAR(20) PRIMARY KEY,
    UPASSWORD VARCHAR(20),
    UFULLNAME VARCHAR(100),
    UPHONE VARCHAR(10),
    UADDRESS INT,
    USTREET VARCHAR(50),
    UPROVINCE VARCHAR(10),
    UIMG VARCHAR(200)
);

CREATE TABLE FEEDBACK
(
    FID INT PRIMARY KEY AUTO_INCREMENT,
    UEMAIL VARCHAR(20),
    FSUBJECT VARCHAR(50),
    FMESSAGE VARCHAR(200),
    FVIEW BOOLEAN,
    CONSTRAINT FEEDBACK_webaccount_UEMAIL_fk FOREIGN KEY (UEMAIL) REFERENCES WEBACCOUNT(UEMAIL) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE WEBTABLE
(
    TID INT PRIMARY KEY AUTO_INCREMENT,
    TSEAT INT
);
CREATE TABLE RESERVATION
(
    REID INT PRIMARY KEY AUTO_INCREMENT,
    UEMAIL VARCHAR(20),
    TID INT,
    RDATE DATE,
    RTIME INT,
    CONSTRAINT RESERVATION_webaccount_UEMAIL_fk FOREIGN KEY (UEMAIL) REFERENCES WEBACCOUNT (UEMAIL) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT RESERVATION_webtable_TID_fk FOREIGN KEY (TID) REFERENCES WEBTABLE (TID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE RESETACCOUNT
(
    RSID INT PRIMARY KEY AUTO_INCREMENT,
    UEMAIL VARCHAR(10),
    RDONE BOOLEAN,
    CONSTRAINT RESET_webaccount_UEMAIL_fk FOREIGN KEY (UEMAIL) REFERENCES WEBACCOUNT (UEMAIL)
);
CREATE TABLE MENU
(
    MID INT PRIMARY KEY AUTO_INCREMENT,
    MIMG varchar(100),
    MNAME VARCHAR(100),
    MCONTENT TEXT,
    MPRICE INT,
    MTYPE VARCHAR(100)
);
CREATE TABLE WEBORDER
(
    OID INT PRIMARY KEY AUTO_INCREMENT,
    UEMAIL VARCHAR(20),
    ODATE DATE,
    CONSTRAINT WEBORDER_webaccount_UEMAIL_fk FOREIGN KEY (UEMAIL) REFERENCES WEBACCOUNT (UEMAIL) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE ORDERDETAIL
(
    DID INT PRIMARY KEY AUTO_INCREMENT,
    OID INT,
    PID VARCHAR(100),
    PQUANTITY VARCHAR(100),
    PPRICE VARCHAR(100),
    CONSTRAINT ORDERDETAIL_weborder_OID_fk FOREIGN KEY (OID) REFERENCES WEBORDER (OID)
);

INSERT INTO HOME(HTITTLE, HCONTAIN) VALUES ('la Villa', 'The best French restaurant in town.');

INSERT INTO RESTAURANT(RCONTAIN) VALUES ('la Villa');
UPDATE RESTAURANT SET RESTAURANT.RID = 0 WHERE RESTAURANT.RID = 1;
INSERT INTO RESTAURANT(RID, RCONTAIN) VALUES (1, 'The restaurant opened in July 1979 by Swiss-born Marco and Gladys Praplan. Their children Jackie and Roger, have taken up the tradition of providing old world French classic cuisine, using fresh local ingredients, in a relaxed and warm atmosphere.');
INSERT INTO RESTAURANT(RID, RCONTAIN) VALUES (2, 'Voted most romantic restaurant year after year, La Gare has become the go-to place for birthday and anniversary celebrations.');

INSERT INTO RES_IMG(RIMG) VALUES ('IMG');
UPDATE RES_IMG SET RES_IMG.RIID = 0 WHERE RES_IMG.RIID = 1;
INSERT INTO RES_IMG(RIID, RIMG) VALUES (1, '1.png');
INSERT INTO RES_IMG(RIID, RIMG) VALUES (2, '2.jpg');

INSERT INTO CONTACT(CTITTLE, CNAME, CEMAIL, CPHONE, CADDRESS, CSTREET, CPROVINCE, COPEN, CCLOSE, CMAP) VALUES ('CONTACT', 'La Villa Restaurant', '1652138@hcmut.edu.vn', '0909090909', 14, 'Ngo Quang Huy', 'HCMC', 7, 12, 'https://www.google.com/maps/d/embed?mid=1pmFJiY1rCjtSvlCESFaMHz5hjJtQkNJW');

INSERT  INTO WEBADMIN(AUSERNAME, APASSWORD) VALUES ('admin', 'admin');

INSERT INTO WEBTABLE(TSEAT) VALUES (0);
UPDATE WEBTABLE SET WEBTABLE.TID = 0 WHERE WEBTABLE.TID = 1;
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (1, 2);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (2, 2);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (3, 2);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (4, 2);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (5, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (6, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (7, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (8, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (9, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (10, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (11, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (12, 4);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (13, 6);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (14, 6);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (15, 6);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (16, 6);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (17, 8);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (18, 8);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (19, 8);
INSERT INTO WEBTABLE(TID, TSEAT) VALUES (20, 8);

INSERT INTO WEBACCOUNT(UEMAIL, UPASSWORD, UFULLNAME, UPHONE, UADDRESS, USTREET, UPROVINCE, UIMG) VALUES  ('1552437@hcmut.edu.vn', '123456789a', 'Bui Nguyen Vu', '0123456789', 123, 'Ly Thuong Kiet', 'HCMC', 'default.png');
INSERT INTO WEBACCOUNT(UEMAIL, UPASSWORD, UFULLNAME, UPHONE, UADDRESS, USTREET, UPROVINCE, UIMG) VALUES  ('1652100@hcmut.edu.vn', 'tumotdentam', 'Nguyen BaO Duy', '987654321', 256, 'Ly Thuong Kiet', 'HCMC', 'pt.png');

INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('1.png', 'GUACAMOLE', 12, 'Tomato, onion, jalapeño, fresh squeezed lime', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('2.png', 'PICO DE GALLO', 7, 'Tomato, red onion, jalapeño, lime', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('3.png', 'NACHOS', 11, 'Black beans, poblano, scallion, crema, arbol salsa', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('4.png', 'GRILLED COD ', 17, 'Marinated in quajillo chile oil, black bean puree, mango salsa', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('5.png', 'BANH MI', 12, 'Pork, pickled vegetables, jalapeño, cilantro, spicy lime aioli', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('6.png', 'KOREAN BBQ', 12, 'Short rib, kimchi, radish, cilantro, spicy lime aioli', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('7.png', 'BRUSSELS SPROUTS', 11, 'Crispy brussels sprouts, smoked onion ranch, puffed wild rice', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('8.png', 'CURRY CAULIFLOWER', 10, 'Crispy cauliflower, curry lime aioli, spiced cashews', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('9.png', 'POLLO', 12, 'Chipotle braised chicken tinga, cilantro, queso fresco', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('10.png', 'CARNE ASADA', 16, 'Grilled steak, refried beans, avocado puree, queso fresco', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('11.png', 'BAJA', 14, 'Crispy mahi mahi, cabbage, avocado puree, spicy lime aioli', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('12.png', 'CARNITAS', 12, 'Crispy pork, black beans, onion, lime, cilantro', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('13.png', 'CHORIZO', 13, 'House made chorizo, lettuce, white onion, roja, pickled jalapeño', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('14.png', 'SHRIMP VERACRUZ', 14, 'Grilled shrimp, green olive aioli, smoked pineapple salsa, jalapeño', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('15.png', 'AVOCADO SALAD', 11, 'Romaine, black beans, corn, red onion, fried jalapeños, avocado dressing', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('16.png', 'MEXICAN CHOPPED SALAD', 11, 'Arugula, romaine, black beans, corn, seasonal vegetable, queso fresco, sherry vinaigrette', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('17.png', 'CAESAR SALAD', 11, 'Romaine lettuce, garlic cotija dressing, spiced croutons', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('18.png', 'TORTILLA SOUP', 8, 'Chicken, spicy chile broth, queso fresco, crispy tortilla', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('19.png', 'ESQUITES', 7, 'Charred corn kernels, spicy lime aioli, chile pequin, queso cotija', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('20.png', 'PLATANOS', 5, 'Sweet plantain, queso fresco, cilantro', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('22.png', 'REFRITOS', 4, 'Pinto beans, chipotle, queso fresco', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('21.png', 'ARROZ CON FRIJOLES', 4, 'rice and beans, pickled onion', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('23.png', 'CRISPY BRUSSELS SPROUTS', 6, 'Queso fresco, lime', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('24.png', 'DIAMOND ESPRESSO', 12, 'Spiced Fruit, Brown Sugar, Sweet', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('25.png', 'PREMIUM CAMPFIRE MORE LAVA CAKE', 15, 'A minute in the microwave turns the smoked Callebaut® chocolate ganache inside this graham cracker cake into a sumptuous molten filling. The fluffy marshmallow topping, made with real marshmallow, becomes golden-brown after a few seconds under a blow-torch', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('27.png', 'COOKIE BUTTER TART', 14, 'A rich shell featuring a flaky bite is filled with decadent cookie butter, with a creamy swirl on top, for a dessert that lands directly in an operator''s sweet spot: an in-demand flavor in a unique-in-the-market product. Just thaw and serve', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('28.png', 'PUMPKIN SPICE LATTE ICE CREAM', 7, 'With a distinctive, autumnal flavor – real pumpkin meets classic fall spices, swirled with salted vanilla whipped cream, flavored ice cream and thin ribbons of coffee-caramel', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('29.png', 'RUSTIC TRIPLE BERRY TART', 14, 'Made from scratch with blackberries, blueberries, raspberries and fresh apple slices, all cradled in a flaky, homemade crust', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('30.png', 'CHOCOLATE PUDDING', 15, 'Monarch Chocolate Pudding has a creamy texture and rich flavor that makes it a delicious snack or dessert', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('31.png', 'CHOCOLATE ICE CREAM', 12, 'Our super-premium quality ice cream is a minimum of 15% butterfat and sweetened with sugar only—no high-fructose corn syrup or other artificial ingredients. It also has a lower overrun (less air) than most ice creams for a denser, creamier flavor and texture, but is still easy to scoop', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('32.png', 'FRENCH VANILLA LIQUID COFFEE CREAM', 9, 'Packed in convenient shelf-stable singles, they require no refrigeration, so they save refrigerator space and are always ready to use. French Vanilla is International Delights most popular flavor', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('33.png', 'MEYER LEMONADE', 9, 'The unique, California-grown Meyer lemons are a cross between lemons and Mandarin oranges that yield a more naturally sweet, less acidic lemonade. We add flavorful lemon juice, filtered water and pure cane sugar and that’s it – never overly sweet, always just right', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('34.png', 'BLACK TEA BAGS', 8, 'Lipton Black Tea has real tea leaves specially blended to enjoy hot or iced. Enjoy Lipton Black Tea iced as the perfect addition for any of your meals', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('35.png', 'FLORIDA VALENCIA ORANGE JUICE ', 12, 'Our juices are created from 100% Valencia oranges to satisfy both West Coast and East Coast flavor preferences. Squeezed at the peak of freshness and never from concentrate, they are gently pasteurized at a lower temperature for a clean, fresh taste', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('36.png', 'BLOODY MARY MIX', 12, 'Cold-break tomatoes used as a base ensures a fresh tomato flavor and bright color, while fresh lime juice, horseradish, black pepper and celery seeds evoke classic cocktail charm', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('37.png', 'MOROCCAN MINT ICED TEA MADE WITH RAINFOREST ALLIANCE GREEN TEA', 12, 'Inspired by a leading global chain’s green teas, our Moroccan mint blend boasts an easy delivery system and a simple ingredient list, without artificial colors, flavors or preservatives', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('26.png', 'PREMIUM BLACK RASPBERRY OMBRE CAKE WITH VANILLA ICING', 12, 'Featuring four layers of progressively darker-hued black raspberry cake, framed by sweet vanilla icing and gem-like sugar beads, this product will shine on your after-dinner menu', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('38.png', 'KUZHI PANIYARAM', 6, 'Paniyaram is a crispy, crunchy and bite-sized delight which is prepared using the leftover batter of Idli or Dosa. Pair it with chutneys and devour it as a tea-time snack', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('39.png', 'PATISHAPTA ', 6, 'It is stuffed with khoya, coconut and jaggery that add a unique flavour to this dish. It is usually served as a roll and is paired with date syrup', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('40.png', 'CHAK-HAO KHEER	', 7, 'Chak-Hao Kheer is a purple coloured kheer which is quite pleasing to the eyes and the palate as well. It is a kind of pudding which is prepared using short-grained joha rice and tastes mildly sweet. It leaves a purple colour when cooked with milk', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('41.png', 'KOTHIMBIR VADI ', 4, 'Kothimbir Vadi has its origins from Maharashtra and is prepared using a mixture of gram flour, coriander leaves and sesame seeds. These coriander fritters can be savoured in the evening as a tea-time snack.  You can also pair it with a hot piping cup of filter coffee', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('42.png', 'UNDHIYU', 4, 'Undhiyu has eggplant, potatoes, peas, green beans, purple yam and other seasonal vegetables too. All of these are slow-cooked in earthen pots that are placed upside-down. They are heated from above and add a smoky flavour', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('43.png', 'GIL-E-FIRDAUS ', 4, 'Gil-e-Firdaus is as sweet as it sounds. This Hyderabadi speciality is a melt-in-mouth dessert which is prepared using white pumpkins. They are cooked with thickened milk and sugar. The garnishing of cardamom powder and chopped dry fruits adds a nice aroma to the dessert', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('44.png', 'BEBINCA ', 5, 'Is prepared using flour, sugar, egg yolk and coconut milk. It also has a hint of nutmeg in it. This layered dessert has about 7-16 layers which makes this an absolute must try', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('45.png', 'GUSHTABA', 8, 'It is an authentic non-vegetarian Kashmiri delicacy which is prepared using meat balls that are cooked in yoghurt gravy. These meat balls are not only tender but also quite flavourful', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('46.png', 'BAZAAR MEAT ', 140, 'As far as the beef itself, Andrés uses American Kobe, which is a touch tougher and more like the sirloin you may be used to', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('47.png', 'SALT-CRUSTED CHICKEN', 80, 'The salt crust on this chicken allows it to cook in its own juices, and also offers some flexibility when it comes to cooking time — a must if you’re hosting a holiday meal', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('48.png', 'CHICKEN IN A BREAD CRUST', 85, 'Looking to truly make an impression? Try this two-in-one French recipe, perfect for Thanksgiving: the bird is tucked inside a bread crust, that you can then use to mop up all of the flavorful cooking juice', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('49.png', 'SWISS CHARD GRATIN', 30, 'With a creamy (and vegan) béchamel sauce, this Swiss chard gratin is easily adapted for other vegetables and has a luscious consistency, but it’s the subtle hint of nutmeg that seals the deal', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('50.png', 'SPAGHETTI SQUASH GRATIN WITH WALNUT AND BACON	', 40, 'This gratin allows the spaghetti squash to really shine as a gourd of its own', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('51.png', 'ELBOW MACARONI WITH COMTÉ AND SPINACH', 30, 'A grownup(ish) version of mac ‘n cheese, with an extra serving of greens', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('52.png', 'GRATIN DAUPHINOIS', 25, 'This creamy French classic features thinly sliced potatoes and the special trick that promotes even cooking and tip top browning', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('53.png', 'CELERIAC AND SWEET POTATO SOUP', 25, 'Perfect as an opener, or served with post-feast leftovers. It’s impossible to say no to a warming, nutrient-packed soup on a cold day', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('54.png', 'CREAMY PUMPKIN SOUP', 3, 'This creamy pumpkin soup is even better if it''s made a day ahead of time', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('55.png', 'CREAMY SPINACH SOUP', 3, 'The spinach in this recipe makes for a flavoursome and intriguing bright-green soup', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('56.png', 'GARLIC BREAD', 2, 'Italian bread is drenched in a butter and herb mixture, then loaded up with mozzarella cheese', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('57.png', 'CREAMY MUSHROOM SOUP', 2, 'Creamy mushroom soup is such a hearty and warming soup and so good for a winter day', 'starter');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('58.png', 'DICED SALMON SALAD', 4, 'This Chopped Salmon Salad recipe is the perfect way to transform leftover salmon fillets into a yummy lunch the next day', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('59.png', 'BONJOUR SALAD', 4, 'Bonjour means "good day" and having Bonjour Dressing with your salad will assure that is what you will have', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('60.png', 'MIXED SALAD', 2, 'A green or garden salad is a simple addition to any dish, for a splash of colour, taste and texture', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('62.png', 'MACEDOINE SALAD', 4, 'Macedonia or macédoine is a salad composed of small pieces of fruit or vegetables', 'salad');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('63.png', 'TUNA IN OIL SALAD', 3, 'This tuna salad works great with a Mediterranean diet, or for those who are going low carb', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('64.png', 'MULBERRY SAUCE', 0, 'Slather this easy homemade barbecue sauce on meat, poultry, and other veggies for grilling at your summer cookouts', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('65.png', 'BBQ SAUCE', 0, 'This recipe has a lot of sweetness and spice', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('66.png', 'BLUE CHEESE SAUCE', 0, 'This thick and creamy blue cheese sauce recipe is perfect to serve with a hearty cut of steak', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('67.png', 'AUSTRALIAN RIB EYE STEAK', 5, 'Australian Wagyu Beef comes from the highly marbled', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('68.png', 'STEWED BONELESS SHIN SHANK BEEF', 5, 'In this luxurious dish, the marrow from slow-simmered beef shanks combines with pan juices and aromatic vegetables, creating a silky gravy perfect for serving with potatoes. Tender roasted garlic adds a deep, caramelized background note', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('69.png', 'USDA CHOICE TOP BLADE STEAK', 7, 'A beef steak is a flat cut of beef', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('70.png', 'AUSTRALIAN FRENCHED LAMB RACK', 8, 'These elegant but easy loin lamb chops are marinated then quickly cooked in a skillet', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('71.png', 'DEEP FRIED CHICKEN THIGH', 5, 'Fried chichken thigh', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('72.png', 'BONELESS ROAST DUCK', 6, 'This Whole Roast Duck with Hoisin Sauce recipe tastes well', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('73.png', 'DEEP FRIED PORK RIBS', 6, 'These are the best crispy fried wings ever', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('74.png', 'FRIED SALMON', 8, 'Baked crispy salmon with a layer of crispy panko shell wrapped', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('75.png', 'TUNA', 5, 'There are very few dishes more visually appealing than a slightly sauteéd albacore steak sprinkled with salt and pepper', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('76.png', 'SPAGHETTI WITH CRAB', 7, 'Gorgeous seafood pasta with fresh chilli & lovely sweet cherry tomatoes', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('77.png', 'SPAGHETTI WITH TUNA & GRILLED MOZZARELLA CHEESE', 5, 'delicious Pasta with tuna and mozzarella cheese', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('78.png', 'SPAGHETTI CARBONARA', 4, 'Pasta, eggs, cheese, and bacon come together in the ultimate Italian favorite: spaghetti carbonara', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('79.png', 'FRENCH FRIES', 2, 'The sugar solution has something to do with the carbohydrates, but by doing it they don''t soak up so much grease, so they get crunchy', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('80.png', 'GARLIC SPAGHETTI', 2, ' Salt, spaghetti, extra virgin olive oil, garlic, red chili flakes, fresh parsley', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('81.png', 'HOMEMADE FRESH BREAD', 1, 'Made from pure flour', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('82.png', 'UNSALTED BUTTER', 1, 'Unsalted butter', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('83.png', 'SUNNY SIDE-UP EGG', 1, 'Perfect fried eggs should have golden, runny yolks and tender, just-set whites', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('84.png', 'FRIED RICE W GARLIC', 2, 'Garlicky and buttery, topped with garlic chips', 'main');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('85.png', 'TIRAMISU', 2, 'Tiramisu cake is made of a tender vanilla cake soaked with coffee syrup, topped with creamy mascarpone frosting', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('86.png', 'ALMONDS CHOCOLATE MOUSSE', 2, 'Chocolate Mousse is made with just two ingredients – heavy whipping cream and chocolate chips – and layered with roasted almonds and homemade toasted meringue to create a decadent s’mores-inspired chocolate mousse parfait', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('87.png', 'MATCHA FLAN', 2, 'Green pancakes dyed with matcha green tea and garnished with green kiwi', 'sweet');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('88.png', 'HEINEKEN', 6, 'Beer', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('89.png', 'STRONGBOW', 6, 'Gold apple | honey | elder flower | red berrie | dark fruit flavor', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('90.png', 'COFFEE', 6, 'Hot | iced', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('91.png', 'MINERAL WATER', 6, 'Mineral water', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('92.png', 'CARROT JUICE', 6, 'Carrot juice', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('93.png', 'FRESH MILK', 6, 'Fresh milk', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('61.png', 'CUBA LIBRE', 20, 'The national drink of Cuba celebrating its independence. There''s more to it than just cola, rum and lime; it''s the way you make it', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('94.png', 'SCOTTISH COFFEE', 30, 'Fairtrade ground coffee, Queen Margot Scottish whisky (2 measures), 2 teaspoons brown sugar, 2 teaspoons caster sugar, 100ml double cream', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('95.png', 'CLASSIC MARTINI', 50, 'The classic dry gin martini is iconic and the world''s most famous cocktail. It is one that should be on every bartender''s list of drinks to know. Though many martinis have been created, there is only one martini and few drinks can beat this simple recipe', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('96.png', 'ALEXANDER', 20, 'The Alexander is a cocktail consisting of some form of alcohol, Cocoa Liqueur (Crème de cacao), and cream', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('97.png', 'RED WINE', 10, 'Wineries throughout the world produce red wine with varying level of boldness, acidity and aromas, so you''re sure to find a bottle you like. Get ready to discover your new favorite red', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('98.png', 'CHAMPAGNE', 20, 'Nothing says it’s a celebration like Champagne. Since the discovery of Méthod Champenoise, or the Champagne method, it’s grown to become the premier sparkling wine', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('99.png', 'SCREWDRIVER', 30, 'The beauty of the Screwdriver lies in the cocktail’s simplicity. Combining orange juice and vodka in a highball glass is about as easy as a cocktail gets and creates a base that’s ripe for experimentation', 'drink');
INSERT INTO MENU(MIMG, MNAME, MPRICE, MCONTENT, MTYPE) VALUES ('100.png', 'ABSOLUT VODKA', 10, 'Absolut Vodka is the leading brand of Premium vodka offering the true taste of vodka in original or your favorite flavors made from natural ingredients', 'drink');
