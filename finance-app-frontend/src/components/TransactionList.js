import React, { useEffect, useState } from 'react';
import axios from 'axios';





const TransactionList = ({ token }) => {
  const [transactions, setTransactions] = useState([]);
  const [filter, setFilter] = useState('');

  useEffect(() => {
    const fetchTransactions = async () => {
      const response = await axios.get('http://localhost:8000/api/transactions', {
        headers: { Authorization: `Bearer ${token}` },
      });
      setTransactions(response.data);
    };
    fetchTransactions();
  }, [token]);

  const filteredTransactions = transactions.filter((transaction) =>
    transaction.description.toLowerCase().includes(filter.toLowerCase())
  );

  return (
    <div>
      <input
        type="text"
        placeholder="Filtrer par description"
        value={filter}
        onChange={(e) => setFilter(e.target.value)}
      />
      <ul>
        {filteredTransactions.map((transaction) => (
          <li key={transaction.id}>
            {transaction.description} - {transaction.amount} €
          </li>
        ))}
      </ul>
    </div>
  );
};

export default TransactionList;
