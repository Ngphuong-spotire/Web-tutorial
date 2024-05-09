CREATE TABLE Bills (
    id INT(11) NOT NULL AUTO_INCREMENT,
    AccountNumber VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    BillID VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    Amount DECIMAL(10,2) NOT NULL,
    Service VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    Category VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    PaymentStatus VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    Comment TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    CreatedAt TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (id)
);
