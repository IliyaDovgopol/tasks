// Define the User class
class User {
    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }

    getFullName() {
        return this.firstName + ' ' + this.lastName;
    }
}

describe('User Entity', () => {
    // Test the getFullName() method
    it('should return full name correctly', () => {
        const user = new User('John', 'Doe');
        expect(user.getFullName()).toBe('John Doe');
    });

    // Check that getFullName() works correctly with different names
    it('should return full name for different users', () => {
        const user1 = new User('Bill', 'Footer');
        const user2 = new User('Jane', 'Smith');

        expect(user1.getFullName()).toBe('Bill Footer');
        expect(user2.getFullName()).toBe('Jane Smith');
    });
});
