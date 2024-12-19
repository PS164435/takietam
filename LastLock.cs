// wysuwanie koncowych schodow
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LastLock : MonoBehaviour
{
    public GameObject key1;
    public GameObject key2;
    public GameObject key3;
    private bool isKey1Moved = false;
    private bool isKey2Moved = false;
    private bool isKey3Moved = false;
    public GameObject lastLock;
    private bool isLastLockMoved = false;
    public float speed = 2f;
    public Vector3 lastLockEndPosition = new Vector3(0f, 0f, 0f);
    private BasedPosition key1BasedPosition;
    private BasedPosition key2BasedPosition;
    private BasedPosition key3BasedPosition;
     
    void Start()
    {
        key1BasedPosition = key1.GetComponent<BasedPosition>();
        key2BasedPosition = key2.GetComponent<BasedPosition>();
        key3BasedPosition = key3.GetComponent<BasedPosition>();
    }

    void Update()
    {
        if (key1 != null && Vector3.Distance(key1.transform.position, key1BasedPosition.GetBasedPosition()) > 1f && !isKey1Moved)
        {
            isKey1Moved = true;
        }
        if (key2 != null && Vector3.Distance(key2.transform.position, key2BasedPosition.GetBasedPosition()) > 1f && !isKey2Moved)
        {
            isKey2Moved = true;
        }
        if (key3 != null && Vector3.Distance(key3.transform.position, key3BasedPosition.GetBasedPosition()) > 1f && !isKey3Moved)
        {
            isKey3Moved = true;
        }

        if (isKey1Moved && isKey2Moved && isKey3Moved && !isLastLockMoved)
        {
            lastLock.transform.position = Vector3.MoveTowards(lastLock.transform.position, lastLockEndPosition, speed * Time.deltaTime);
            if (Vector3.Distance(lastLock.transform.position, lastLockEndPosition) < 0.01f)
            {
                isLastLockMoved = true;
            }
        }
    }
}
