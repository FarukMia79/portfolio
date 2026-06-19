class AppStorage {
    constructor() {
        this.storage = window.localStorage;
    }

    setToken(token) {
        this.storage.setItem('token', token);
    }

    getToken() {
        return this.storage.getItem('token');
    }

    removeToken() {
        this.storage.removeItem('token');
    }
}

export default new AppStorage();