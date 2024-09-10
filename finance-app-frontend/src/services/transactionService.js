import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
});

export const loginUser = (email, password) => {
  return api.post('/login', { email, password });
};

export const getTransactions = (token) => {
  return api.get('/transactions', {
    headers: { Authorization: `Bearer ${token}` },
  });
};
