import { useState } from 'react';

export default function useRole() {
	const getRole = () => {
    const roleString = sessionStorage.getItem('role');
    const userRole = JSON.parse(roleString);
    return userRole?.role
  };
  const [role, setRole] = useState(getRole());

  const saveRole = userRole => {
    sessionStorage.setItem('role', JSON.stringify(userRole));
    setRole(userRole.role);
  };

  return {
    setRole: saveRole,
    role
  }

}