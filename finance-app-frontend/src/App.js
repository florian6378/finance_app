import React, { useState } from 'react';
import LoginForm from './components/LoginForm';
import TransactionList from './components/TransactionList';  // Assure-toi que cet import est correct
import TransactionChart from './components/TransactionChart';

function App() {
  const [token, setToken] = useState(null);
  const [transactions, setTransactions] = useState([]);

  return (
    <div className="App">
      {!token ? (
        <LoginForm setToken={setToken} />
      ) : (
        <>
          <TransactionList token={token} setTransactions={setTransactions} />
          <TransactionChart transactions={transactions} />
        </>
      )}
    </div>
  );
}

export default App;
