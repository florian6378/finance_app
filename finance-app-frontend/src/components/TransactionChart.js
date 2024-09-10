import React from 'react';
import { Bar } from 'react-chartjs-2';





const TransactionChart = ({ transactions }) => {
  const labels = transactions.map((t) => t.description);
  const data = {
    labels,
    datasets: [
      {
        label: 'Montant des transactions',
        data: transactions.map((t) => t.amount),
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
      },
    ],
  };

  return <Bar data={data} />;
};

export default TransactionChart;
