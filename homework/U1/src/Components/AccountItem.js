import React, { useState } from 'react';

const AccountItem = ({ account, addFunds, deductFunds, deleteAccount }) => {
  const [amount, setAmount] = useState('');

  const handleAddFunds = () => {
    if (amount) {
      addFunds(account.id, amount);
      setAmount('');
    }
  };

  const handleDeductFunds = () => {
    if (amount) {
      deductFunds(account.id, amount);
      setAmount('');
    }
  };

  const handleDeleteAccount = () => {
    if (account.amount === 0) {
      deleteAccount(account.id);
    }
  };

  return (
    <div className="account-item">
      <p>
        {account.name} {account.surname} - Amount: ${account.amount}
      </p>
      <div>
        <input
          type="number"
          value={amount}
          onChange={(e) => setAmount(e.target.value)}
        />
        <button onClick={handleAddFunds}>Add Funds</button>
        <button onClick={handleDeductFunds}>Deduct Funds</button>
        <button onClick={handleDeleteAccount} disabled={account.amount > 0}>
          Delete
        </button>
      </div>
    </div>
  );
};

export default AccountItem;
