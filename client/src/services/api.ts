// api通信先のエンドポイントを定義
const baseURL = "http://127.0.0.1:8000/api/v1"

/**
 * 全データを取得するAPIリクエストのテンプレート
 * @param {string} url - APIリクエストするURLのパス
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function getData(url: string) {
  try {
    const requestURL = baseURL + url;

    const response = await fetch(requestURL, {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('authToken')}`
      }
    });

    if (response.status === 500) {
      return { internalServerError: { message: 'サーバー内でエラーが発生しました。' } }
    }

    if (response.status === 404) {
      return { notFoundError: { message: 'ページが見つかりません。' } }
    }

    return await response.json();
  } catch (error) {
    return { error: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}

/**
 * データを登録するAPIリクエストのテンプレート
 * @param {string} url - APIリクエストするURLのパス
 * @param {string[] | int[] ?} formData
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function createData(url: string, formData: any) {
  try {
    const requestURL = baseURL + url;

    const response = await fetch(requestURL, {
      method: 'POST',
      headers: {
        Authorization: `Bearer ${localStorage.getItem('authToken')}`
      },
      body: formData
    });

    if (response.status === 500) {
      return { internalServerError: { message: 'サーバー内でエラーが発生しました。' } }
    }

    return await response.json();
  } catch (error) {
    return { error: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}

/**
 * データを削除するAPIリクエストのテンプレート
 * @param {string} url - APIリクエストするURLのパス
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function deleteData(url: string) {
  try {
    const requestURL = baseURL + url;

    const response = await fetch(requestURL, {
      method: 'DELETE',
      headers: {
        Authorization: `Bearer ${localStorage.getItem('authToken')}`
      }
    });

    if (response.status === 500) {
      return { internalServerError: { message: 'サーバー内でエラーが発生しました。' } }
    }

    return await response.json();
  } catch (error) {
    return { error: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}

/**
 * データを更新するAPIリクエストのテンプレート
 * @param {string} url - APIリクエストするURLのパス
 * @param {string[] | int[] ?} formData
 * @returns {Promise<Object>} APIからのレスポンス
 * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
 */
export async function updateData(url: string, formData: any) {
  try {
    const requestURL = baseURL + url;

    const response = await fetch(requestURL, {
      method: 'POST',
      headers: {
        // PUTリクエストに置き換え
        'X-HTTP-Method-Override': 'PUT',
        Authorization: `Bearer ${localStorage.getItem('authToken')}`
      },
      body: formData
    });

    if (response.status === 500) {
      return { internalServerError: { message: 'サーバー内でエラーが発生しました。' } }
    }

    return await response.json();
  } catch (error) {
    return { error: { message: 'APIリクエスト中にエラーが発生しました。' } };
  }
}