import React, { useState, useEffect } from 'react';
import AccountItem from './AccountItem';
import AccountForm from './AccountForm';

const AccountList = () => {
  const [accounts, setAccounts] = useState([]);

  useEffect(() => {
    const storedAccounts = JSON.parse(localStorage.getItem('accounts')) || [];
    setAccounts(storedAccounts);
  }, []);

  useEffect(() => {
    localStorage.setItem('accounts', JSON.stringify(accounts));
  }, [accounts]);

  const addFunds = (id, amount) => {
    setAccounts((prevAccounts) =>
      prevAccounts.map((account) =>
        account.id === id
          ? { ...account, amount: account.amount + parseFloat(amount) }
          : account
      )
    );
  };

  const deductFunds = (id, amount) => {
    setAccounts((prevAccounts) =>
      prevAccounts.map((account) =>
        account.id === id
          ? {
              ...account,
              amount: Math.max(0, account.amount - parseFloat(amount)),
            }
          : account
      )
    );
  };

  const deleteAccount = (id) => {
    setAccounts((prevAccounts) =>
      prevAccounts.filter((account) => account.id !== id)
    );
  };

  const createAccount = (name, surname) => {
    const newAccount = {
      id: Date.now(),
      name,
      surname,
      amount: 0,
    };

    setAccounts((prevAccounts) => [...prevAccounts, newAccount]);
  };

  return (
    <div>
      <AccountForm createAccount={createAccount} />
      {accounts
        .sort((a, b) => a.surname.localeCompare(b.surname))
        .map((account) => (
          <AccountItem
            key={account.id}
            account={account}
            addFunds={addFunds}
            deductFunds={deductFunds}
            deleteAccount={deleteAccount}
          />
        ))}
    </div>
  );
};

export default AccountList;
