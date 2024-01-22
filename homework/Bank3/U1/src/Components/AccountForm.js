import React, { useState } from 'react';

const AccountForm = ({ createAccount }) => {
  const [name, setName] = useState('');
  const [surname, setSurname] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    if (name && surname) {
      createAccount(name, surname);
      setName('');
      setSurname('');
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Name:
        <input
          type="text"
          value={name}
          onChange={(e) => setName(e.target.value)}
        />
      </label>
      <label>
        Surname:
        <input
          type="text"
          value={surname}
          onChange={(e) => setSurname(e.target.value)}
        />
      </label>
      <button type="submit">Create Account</button>
    </form>
  );
};

export default AccountForm;
