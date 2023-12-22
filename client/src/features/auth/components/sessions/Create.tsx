import '../../styles/sessions/Create.scss'

/** 
 * @description 管理者のログインを行うコンポーネント
 */
export default function AuthSessionsCreate() {
  return (
    <>
      <div className='login-area'>
        <div className="login-container">
          <h2>Welcome to Your Dashboard</h2>
          <h5>Please sign in</h5>

          <form>
            <div className='form-group'>
              <input type="email" placeholder='Email' />
            </div>

            <div className='form-group'>
              <input type="password" placeholder='Password' />
            </div>

            <button>Sign in</button>
          </form>
        </div>
      </div>
    </>
  );
}
