<!-- -- Create Users Table -->
CREATE TABLE Users (
    UserID INTEGER PRIMARY KEY,
    Username TEXT NOT NULL,
    Email TEXT NOT NULL,
    Password TEXT NOT NULL
);

<!-- -- Create Ingredients Table -->
CREATE TABLE Ingredients (
    IngredientID INTEGER PRIMARY KEY,
    Name TEXT NOT NULL,
    Category TEXT
);

<!-- -- Create Recipes Table -->
CREATE TABLE Recipes (
    RecipeID INTEGER PRIMARY KEY,
    Title TEXT NOT NULL,
    Description TEXT,
    PreparationTime INTEGER,
    CookingTime INTEGER,
    DifficultyLevel INTEGER,
    Servings INTEGER,
    AuthorID INTEGER,
    FOREIGN KEY (AuthorID) REFERENCES Users(UserID)
);

<!-- -- Create RecipeIngredients Table (Many-to-Many Relationship) -->
CREATE TABLE RecipeIngredients (
    RecipeID INTEGER,
    IngredientID INTEGER,
    Quantity REAL,
    Unit TEXT,
    PRIMARY KEY (RecipeID, IngredientID),
    FOREIGN KEY (RecipeID) REFERENCES Recipes(RecipeID),
    FOREIGN KEY (IngredientID) REFERENCES Ingredients(IngredientID)
);





<!-- -- Create RecipeTags Table (Many-to-Many Relationship) -->
CREATE TABLE RecipeTags (
    RecipeID INTEGER,
    TagID INTEGER,
    PRIMARY KEY (RecipeID, TagID),
    FOREIGN KEY (RecipeID) REFERENCES Recipes(RecipeID),
    FOREIGN KEY (TagID) REFERENCES Tags(TagID)
);

<!-- -- Create Cuisines Table -->
CREATE TABLE Cuisines (
    CuisineID INTEGER PRIMARY KEY,
    Name TEXT NOT NULL
);

<!-- -- Create RecipeCuisines Table (Many-to-Many Relationship) -->
CREATE TABLE RecipeCuisines (
    RecipeID INTEGER,
    CuisineID INTEGER,
    PRIMARY KEY (RecipeID, CuisineID),
    FOREIGN KEY (RecipeID) REFERENCES Recipes(RecipeID),
    FOREIGN KEY (CuisineID) REFERENCES Cuisines(CuisineID)
);


<!-- -- Insert  data into Ingredients table -->
INSERT INTO Ingredients (Name, Category)
VALUES 
    ('Chicken', 'Meat'),
    ('Tomato', 'Vegetable'),
    ('Pasta', 'Grain');

<!-- -- Insert  data into Recipes table -->
INSERT INTO Recipes (Title, Description, PreparationTime, CookingTime, DifficultyLevel, Servings, AuthorID)
VALUES 
    ('Chicken Pasta', 'Delicious chicken pasta recipe', 15, 30, 3, 4, 1),
    ('Tomato Salad', 'Healthy tomato salad recipe', 10, 0, 1, 2, 2);

<!-- -- Insert  data into RecipeIngredients table -->
INSERT INTO RecipeIngredients (RecipeID, IngredientID, Quantity, Unit)
VALUES 
    (1, 1, 500, 'g'),
    (1, 2, 3, 'medium'),
    (1, 3, 300, 'g'),
    (2, 2, 5, 'medium');



<!-- -- Insert  data into Tags table -->
INSERT INTO Tags (Name)
VALUES 
    ('Italian'),
    ('Healthy');

<!-- -- Insert  data into RecipeTags table -->
INSERT INTO RecipeTags (RecipeID, TagID)
VALUES 
    (1, 1),
    (1, 2),
    (2, 2);

<!-- -- Insert  data into Cuisines table -->
INSERT INTO Cuisines (Name)
VALUES 
    ('Italian'),
    ('Mediterranean');

<!-- -- Insert sample data into RecipeCuisines table -->
INSERT INTO RecipeCuisines (RecipeID, CuisineID)
VALUES 
    (1, 1),
    (2, 2);
